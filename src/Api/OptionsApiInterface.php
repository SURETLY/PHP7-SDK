<?php

namespace Suretly\LenderApi\Api;

use Suretly\LenderApi\Exception\ResponseErrorException;
use Suretly\LenderApi\Model\Options;

/**
 * Interface OptionsApiInterface
 * @package Suretly\LenderApi\Api
 */
interface OptionsApiInterface
{
    /**
     * Получение параметров для поиска поручителей
     * @return Options
     * @throws \JsonMapper_Exception
     * @throws ResponseErrorException
     */
    public function getOptions(): Options;
}