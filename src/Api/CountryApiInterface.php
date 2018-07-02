<?php

namespace Suretly\LenderApi\Api;

use Suretly\LenderApi\Exception\ResponseErrorException;
use Suretly\LenderApi\Model\Country;

/**
 * Interface CountryApiInterface
 * @package Suretly\LenderApi\Api
 */
interface CountryApiInterface
{
    /**
     * Получение списка валют
     *
     * @return Country[]
     * @throws \JsonMapper_Exception
     * @throws ResponseErrorException
     */
    public function getCountries(): array;
}