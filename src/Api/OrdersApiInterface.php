<?php

namespace Suretly\LenderApi\Api;

use Suretly\LenderApi\Exception\ResponseErrorException;
use Suretly\LenderApi\Model\Orders;

/**
 * Interface OrdersApiInterface
 * @package Suretly\LenderApi\Api
 */
interface OrdersApiInterface
{
    /**
     * Получение Orders с заданными параметрами $limit и $skip
     *
     * @param int $limit
     * @param int $skip
     * @return Orders
     * @throws \JsonMapper_Exception
     * @throws ResponseErrorException
     */
    public function getOrders(int $limit, int $skip): Orders;
}