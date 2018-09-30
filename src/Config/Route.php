<?php

namespace Suretly\LenderApi\Config;

/**
 * Class Route
 * @package Suretly\LenderApi\Config
 */
final class Route
{
    // CONTRACT
    const CONTRACT_GET = '/contract/get';
    const CONTRACT_ACCEPT = '/contract/accept';

    // COUNTRIES
    const COUNTRIES = '/countries';

    // CURRENCIES
    const CURRENCIES = '/currencies';

    // OPTIONS
    const OPTIONS = '/options';

    // ORDER
    const ORDER_GET = '/order/get';
    const ORDER_GET_STATUS = '/order/status';
    const ORDER_NEW = '/order/new';
    const ORDER_ISSUED = '/order/issued';
    const ORDER_PAID = '/order/paid';
    const ORDER_PARTIAL_PAID = '/order/partialpaid';
    const ORDER_PROLONG = '/order/prolong';
    const ORDER_PUBLISHED = '/order/public';
    const ORDER_STOP = '/order/stop';
    const ORDER_UNPAID = '/order/unpaid';
    const ORDER_UPLOAD_IMAGE = '/order/image_upload';

    // ORDERS
    const ORDERS = '/orders';
    const ORDERS_GET_PUBLIC_URL = '/orders/get_public_url';
}