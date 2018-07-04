<?php

namespace Suretly\LenderApi\Tests\Api;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\Model\NewOrder;
use Suretly\LenderApi\LenderManager;

/**
 * Class ContractApiTest
 * @package Suretly\LenderApi\Tests\Api
 */
class ContractApiTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testGetContract($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response->id;
        $contract = $manager->getContract($orderId);
        $this->assertNotNull($contract);
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $orderParams
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testContractAccept($params, $orderParams)
    {
        $manager = new LenderManager($params);
        $newOrder = $this->getNewOrder($orderParams);
        $response = $manager->postNewOrder($newOrder);
        $orderId = $response->id;
        $manager->getContract($orderId);
        $manager->postContractAccept($orderId);
        $this->assertNotNull(true);
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