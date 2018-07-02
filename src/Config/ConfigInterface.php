<?php

namespace Suretly\LenderApi\Config;

/**
 * Interface ConfigInterface
 * @package Suretly\LenderApi\Config
 */
interface ConfigInterface
{
    /**
     * Return base API url
     * @return string
     */
    public function getApiURL(): string;

    /**
     * Return generated auth token for authorization
     *
     * @return string
     * @throws \Exception
     */
    public function getAuthToken(): string;

    /**
     * Return header is user agent
     *
     * @return string
     */
    public function getUserAgent(): string;
}