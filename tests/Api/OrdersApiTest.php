<?php

namespace Suretly\LenderApi\Tests\Api;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\LenderManager;

/**
 * Class OrdersApiTest
 * @package Suretly\LenderApi\Tests\Api
 */
class OrdersApiTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testGetOrdersWithMaxLimit($params)
    {
        $limit = 25;
        $manager = new LenderManager($params);
        $orders = $manager->getOrders($limit);

        $this->assertLessThanOrEqual($limit, count($orders->getList()), 'ORDERS_GET: limit don\'t work');
    }

    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testGetOrdersWithSkip($params)
    {
        $manager = new LenderManager($params);
        $orders = $manager->getOrders(1);
        $orderSelected = current($orders->getList());
        if ($orderSelected) {
            $orders = $manager->getOrders(1, 1);
            $this->assertNotSame($orderSelected, current($orders), 'ORDERS_GET: skip don\'t work');
        }
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
                    'id' => 'q2',
                    'token' => '317',
                    'server' => 'develop'
                ]
            ]
        ];
    }
}