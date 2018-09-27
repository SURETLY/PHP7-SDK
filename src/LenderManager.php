<?php

namespace Suretly\LenderApi;

use Suretly\LenderApi\Api\ContractApiInterface;
use Suretly\LenderApi\Api\CountryApiInterface;
use Suretly\LenderApi\Api\CurrencyApiInterface;
use Suretly\LenderApi\Api\OptionsApiInterface;
use Suretly\LenderApi\Api\OrderApiInterface;
use Suretly\LenderApi\Api\OrdersApiInterface;
use Suretly\LenderApi\Config\Route;
use Suretly\LenderApi\Http\HttpClient;
use Suretly\LenderApi\Http\HttpClientInterface;
use Suretly\LenderApi\Model\Country;
use Suretly\LenderApi\Model\Currency;
use Suretly\LenderApi\Model\NewOrder;
use Suretly\LenderApi\Model\Options;
use Suretly\LenderApi\Model\Order;
use Suretly\LenderApi\Model\Orders;
use Suretly\LenderApi\Model\OrderStatus;

/**
 * Class LenderManager
 * @package Suretly\LenderApi
 */
class LenderManager implements
    ContractApiInterface,
    CountryApiInterface,
    CurrencyApiInterface,
    OptionsApiInterface,
    OrdersApiInterface,
    OrderApiInterface,
    TransformInterface
{
    /**
     * Create LenderManager
     * @param $id
     * @param $token
     * @param string $server
     * @return LenderManager
     */
    public static function create($id, $token, $server = 'sandbox')
    {
        return new LenderManager(compact('id', 'token', 'server'));
    }

    private const QUERY = 'query';
    private const BODY = 'body';
    private const ID = 'id';
    private const AUTH = 'auth';

    /**
     * @var HttpClientInterface $httpClient
     */
    private $httpClient;

    /**
     * @var \JsonMapper $jsonMapper
     */
    private $jsonMapper;

    /**
     * Suretly constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->httpClient = new HttpClient($config);
        $this->jsonMapper = new \JsonMapper();
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @inheritdoc
     */
    public function mapToObject($response, $class)
    {
        return $this->jsonMapper->map($this->getData($response), $class);
    }

    /**
     * @inheritdoc
     */
    public function mapToArrayObject($response, $class)
    {
        $data = $this->getData($response);
        if(!$data) {
            $data = [];
        }

        return $this->jsonMapper->mapArray($data, [], $class);
    }

    /**
     * @inheritDoc
     */
    public function getContract(string $id): string
    {
        return $this->httpClient->get(Route::CONTRACT_GET, $this->getParamId($id, true));
    }

    /**
     * @inheritDoc
     */
    public function postContractAccept(string $id): void
    {
        $this->httpClient->post(Route::CONTRACT_ACCEPT, $this->getParamId($id));
    }

    /**
     * @inheritDoc
     */
    public function getCountries(): array
    {
        $response = $this->httpClient->get(Route::COUNTRIES, [self::AUTH => false]);

        return $this->mapToArrayObject($response, Country::class);
    }

    /**
     * @inheritDoc
     */
    public function getCurrencies(): array
    {
        $response = $this->httpClient->get(Route::CURRENCIES, [self::AUTH => false]);

        return $this->mapToArrayObject($response, Currency::class);
    }

    /**
     * @inheritdoc
     */
    public function getOptions(): Options
    {
        $response = $this->httpClient->get(Route::OPTIONS);

        return $this->mapToObject($response, new Options());
    }

    /**
     * @inheritdoc
     */
    public function getOrders(int $limit = 25, int $skip = null): Orders
    {
        $response = $this->httpClient->get(Route::ORDERS, [self::QUERY => compact('limit', 'skip')]);

        return $this->mapToObject($response, new Orders());
    }

    /**
     * @inheritDoc
     */
    public function getOrder(string $id): Order
    {
        $response = $this->httpClient->get(Route::ORDER_GET, $this->getParamId($id, true));

        return $this->mapToObject($response, new Order());
    }

    /**
     * @inheritDoc
     */
    public function getOrderPublicUrl(string $id): string
    {
        $response = $this->httpClient->get(Route::ORDERS_GET_PUBLIC_URL, $this->getParamId($id, true));

        return $this->getData($response)->public_url;
    }

    /**
     * @inheritDoc
     */
    public function postNewOrder(NewOrder $newOrder): object
    {
        $response = $this->httpClient->post(Route::ORDER_NEW, [self::BODY => $newOrder]);

        return $this->getData($response);
    }

    /**
     * @inheritDoc
     */
    public function postUploadImageOrder(string $id, string $realPathToFile, string $filename = null): void
    {
        $this->httpClient->post(Route::ORDER_UPLOAD_IMAGE, [
            self::QUERY => [
                self::ID => $id
            ],
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => file_get_contents($realPathToFile),
                    'filename' => $filename ?? pathinfo($realPathToFile)['basename']
                ]
            ]
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getOrderStatus(string $id): OrderStatus
    {
        $response = $this->httpClient->get(Route::ORDER_GET_STATUS, $this->getParamId($id, true));

        return $this->mapToObject($response, new OrderStatus());
    }

    /**
     * @inheritDoc
     */
    public function postOrderStop(string $id): void
    {
        $this->httpClient->post(Route::ORDER_STOP, $this->getParamId($id));
    }

    /**
     * @inheritDoc
     */
    public function postOrderIssued(string $id): void
    {
        $this->httpClient->post(Route::ORDER_ISSUED, $this->getParamId($id));
    }

    /**
     * @inheritDoc
     */
    public function postOrderPaid(string $id): void
    {
        $this->httpClient->post(Route::ORDER_PAID, $this->getParamId($id));
    }

    /**
     * @inheritDoc
     */
    public function postOrderPartialPaid(string $id, float $sum): void
    {
        $this->httpClient->post(Route::ORDER_PARTIAL_PAID, [self::BODY => compact('id', 'sum')]);
    }

    /**
     * @inheritDoc
     */
    public function postOrderUnpaid(string $id): void
    {
        $this->httpClient->post(Route::ORDER_UNPAID, $this->getParamId($id));
    }

    /**
     * @inheritDoc
     */
    public function getOrderProlong(string $id, int $days): float
    {
        $response = $this->httpClient->get(Route::ORDER_PROLONG, [self::QUERY => compact('id', 'days')]);

        return (float)$this->getData($response)->fee_amount;
    }

    /**
     * @inheritDoc
     */
    public function postOrderProlong(string $id, int $days): void
    {
        $this->httpClient->post(Route::ORDER_PROLONG, [self::BODY => compact('id', 'days')]);
    }

    ////////////////

    /**
     * Return the transformed data
     *
     * @param string $data
     * @param bool $assoc
     * @return mixed
     */
    private function getData(string $data, $assoc = false)
    {
        return $assoc ? json_decode($data, $assoc)['data'] : json_decode($data)->data;
    }

    /**
     * Returns a simple array with only one argument ID
     *
     * @param $id
     * @param bool $isQuery
     * @return array
     */
    private function getParamId($id, bool $isQuery = false): array
    {
        return $isQuery ? [self::QUERY => [self::ID => $id]] : [self::BODY => [self::ID => $id]];
    }
}