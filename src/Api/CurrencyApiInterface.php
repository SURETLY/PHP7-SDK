<?php

namespace Suretly\LenderApi\Api;

use Suretly\LenderApi\Exception\ResponseErrorException;
use Suretly\LenderApi\Model\Currency;

/**
 * Interface CurrencyApiInterface
 * @package Suretly\LenderApi\Api
 */
interface CurrencyApiInterface
{
    /**
     * Получение списка валют
     *
     * @return Currency[]
     * @throws \JsonMapper_Exception
     * @throws ResponseErrorException
     */
    public function getCurrencies(): array;
}