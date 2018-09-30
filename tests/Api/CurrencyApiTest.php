<?php

namespace Suretly\LenderApi\Tests\Api;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\LenderManager;

/**
 * Class CurrenciesApiTest
 * @package Suretly\LenderApi\Tests\Api
 */
class CurrenciesApiTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testGetCurrencies($params)
    {
        $manager = new LenderManager($params);
        $countries = $manager->getCurrencies();
        $this->assertGreaterThan(0, count($countries), 'Currencies is empty');
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