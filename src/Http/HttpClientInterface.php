<?php

namespace Suretly\LenderApi\Http;

use Suretly\LenderApi\Config\Config;
use Suretly\LenderApi\Exception\ResponseErrorException;

/**
 * Interface HttpClientInterface
 * @package Suretly\LenderApi\Http
 */
interface HttpClientInterface
{
    /**
     * @param string $uri
     * @param array $params
     * @return mixed
     * @throws ResponseErrorException
     */
    public function get($uri, array $params);

    /**
     * @param string $uri
     * @param array $params
     * @return mixed
     * @throws ResponseErrorException
     */
    public function post($uri, array $params);

    /**
     * @return Config
     */
    public function getConfig(): Config;
}