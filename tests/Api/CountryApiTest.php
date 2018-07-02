<?php

namespace Suretly\LenderApi\Tests\Api;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\LenderManager;

/**
 * Class CountryApiTest
 * @package Suretly\LenderApi\Tests\Api
 */
class CountryApiTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testGetCountries($params)
    {
        $manager = new LenderManager($params);
        $countries = $manager->getCountries();
        $this->assertGreaterThan(0, count($countries), 'Countries is empty');
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
                    'id' => '59ca100acea0997574cef785',
                    'token' => '317',
                    'server' => 'develop'
                ]
            ]
        ];
    }
}