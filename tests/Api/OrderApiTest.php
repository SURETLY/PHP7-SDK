<?php

namespace Suretly\LenderApi\Tests\Api;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\Model\NewOrder;
use Suretly\LenderApi\LenderManager;

/**
 * Class OrderApiTest
 * @package Suretly\LenderApi\Tests\Api
 */
class OrderApiTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testGetAndPostOrder($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $order = $manager->getOrder($orderId);

        $this->assertEquals($orderId, $order->getId());
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testGetOrderPublicUrl($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $url = $manager->getOrderPublicUrl($orderId);

        $this->assertNotNull($url);
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostUploadImageOrder($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];

        $path = __DIR__ . '/../../examples/assests/avatar.png';
        $manager->postUploadImageOrder($orderId, $path);
        $result = true;

        $this->assertNotNull($result);
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostOrderGetStatus($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $orderStatus = $manager->getOrderStatus($orderId);

        $this->assertEquals(0, $orderStatus->getStatus());
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostOrderStop($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $manager->postOrderStop($orderId);
        $orderStatus = $manager->getOrderStatus($orderId);

        $this->assertEquals(2, $orderStatus->getStatus());
    }


    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostOrderPublished($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder(array_merge($orderParams, ['is_public' => false]));
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $manager->postOrderPublished($orderId);
        $orderStatus = $manager->getOrderStatus($orderId);

        $this->assertEquals(0, $orderStatus->getStatus());
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostContractAccept($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $manager->getContract($orderId);
        $manager->postContractAccept($orderId);
        $orderStatus = $manager->getOrderStatus($orderId);

        $this->assertEquals(1, $orderStatus->getStatus());
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostOrderIssued($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $manager->getContract($orderId);
        $manager->postContractAccept($orderId);

        // TODO: Нужно для заявки добавтить поручителей
        $orderStatus = $manager->getOrderStatus($orderId);
        $manager->postOrderIssued($orderId);
        $this->assertEquals(5, $orderStatus->getStatus());
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostOrderPaid($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $manager->getContract($orderId);
        $manager->postContractAccept($orderId);

        // TODO: Нужно для заявки добавтить поручителей
        $manager->postOrderIssued($orderId);
        $orderStatus = $manager->getOrderStatus($orderId);

        $this->assertEquals(12, $orderStatus->getStatus());
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostOrderPartialPaid($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $manager->getContract($orderId);
        $manager->postContractAccept($orderId);

        // TODO: Нужно для заявки добавтить поручителей
        $manager->postOrderPartialPaid($orderId, 100.0);
        $orderStatus = $manager->getOrderStatus($orderId);

        $this->assertEquals(13, $orderStatus->getStatus());
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostOrderUnpaid($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $manager->getContract($orderId);
        $manager->postContractAccept($orderId);

        // TODO: Нужно для заявки добавтить поручителей
        $manager->postOrderUnpaid($orderId);
        $orderStatus = $manager->getOrderStatus($orderId);

        $this->assertEquals(13, $orderStatus->getStatus());
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testPostOrderProlong($params, $orderParams)
    {
        /** @var NewOrder $newOrder */
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response['id'];
        $manager->getContract($orderId);
        $manager->postContractAccept($orderId);

        // TODO: Нужно для заявки добавтить поручителей
        $days = $newOrder->getLoanTerm();
        $val = $manager->getOrderProlong($orderId, $days);
        $this->assertNotNull($val);
        $manager->postOrderProlong($orderId, $days);
        $result = true;

        $this->assertNotNull($result);
    }

    /**
     * Params provider
     *
     * @return array
     */
    public function paramsProvider()
    {
        return [
            [
                'params' => [
                    'id' => '59ca100acea0997574cef785',
                    'token' => '317',
                    'server' => 'develop'
                ],
                'newOrder' => [
                    'uid' => '100500',
                    'is_public' => true,
                    'borrower' => [
                        'name' => [
                            'first' => 'Tim',
                            'middle' => 'Show',
                            'last' => 'Ivanov',
                            'maiden' => 'Targaryen'
                        ],
                        'gender' => '1',
                        'birth' => [
                            'date' => '11.05.1981',
                            'place' => 'Winterfell'
                        ],
                        'email' => 'tsi@targaryen.com',
                        'phone' => '+30001235678',
                        'profile_url' => 'https://www.facebook.com/GameOfThrones/',
                        'photo_url' => 'https://www.google.ru/logos/doodles/2018/world-cup-2018-day-17-6229715604996096.2-law.gif',
                        'city' => 'Novosibirsk',
                        'identity_document_type' => 'passport_rf',
                        'identity_document' => [
                            'series' => '5201',
                            'number' => '2345678',
                            'issue_date' => '01.05.2012',
                            'issue_place' => 'Novosibirsk',
                            'issue_code' => '540-07',
                            'registration' => [
                                'country' => 'Russia',
                                'zip' => '630093',
                                'area' => 'Russia',
                                'city' => 'Novosibirsk',
                                'street' => 'Serebrennikovskaya',
                                'house' => '29',
                                'building' => '1',
                                'flat' => '10'
                            ]
                        ],
                        'residential' => [
                            'country' => 'Russia',
                            'zip' => '630093',
                            'area' => 'Russia',
                            'city' => 'Novosibirsk',
                            'street' => 'Serebrennikovskaya',
                            'house' => '29',
                            'building' => '1',
                            'flat' => '10'
                        ]
                    ],
                    'credit_score_type' => 'default',
                    'user_credit_score' => 500,
                    'loan_sum' => 5123.00,
                    'loan_term' => 30,
                    'loan_rate' => 56.34,
                    'currency_code' => 'RUB'
                ]
            ]
        ];
    }

    /**
     * @param $orderParams
     * @return mixed
     * @throws \JsonMapper_Exception
     */
    private function getNewOrder($orderParams)
    {
        $jsonMapper = new \JsonMapper();

        return $jsonMapper->map(json_decode(json_encode($orderParams)), new NewOrder());
    }
}
