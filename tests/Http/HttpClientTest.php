<?php

namespace Suretly\LenderApi\Tests\Http;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\Http\HttpClient;
use Suretly\LenderApi\LenderManager;

/**
 * Class HttpClientTest
 * @package Suretly\LenderApi\Tests\Http
 */
class HttpClientTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     */
    public function testCreate($params)
    {
        $manager = new LenderManager($params);
        $httpClient = $manager->getHttpClient();

        $this->assertEquals(new HttpClient($params), $httpClient);
    }

    /**
     * @dataProvider paramsProvider
     */
    public function testGetAndPostRequest($params)
    {
        // TODO: create tests
        $this->assertNotEmpty(new HttpClient($params));
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