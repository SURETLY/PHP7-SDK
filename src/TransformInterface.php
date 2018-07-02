<?php

namespace Suretly\LenderApi;

use Suretly\LenderApi\Exception\ResponseErrorException;

/**
 * Interface TransformInterface
 * @package Suretly\LenderApi
 */
interface TransformInterface
{
    /**
     * Map response to object
     *
     * @param $response
     * @param $mappingObj
     * @return mixed
     * @throws \JsonMapper_Exception
     */
    function mapToObject($response, $class);

    /**
     * Map response to array objects
     *
     * @param $response
     * @param $mappingObj
     * @return mixed
     * @throws \JsonMapper_Exception
     */
    function mapToArrayObject($response, $class);
}