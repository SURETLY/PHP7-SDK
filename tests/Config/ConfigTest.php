<?php

namespace Suretly\LenderApi\Tests\Config;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\Config\Config;

/**
 * Class ConfigTest
 * @package Suretly\LenderApi\Tests\Config
 */
class ConfigTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     */
    public function testCreateConfig($params)
    {
        $config = new Config($params);

        $this->assertEquals($params['token'], $config->getToken());
        $this->assertEquals($params['id'], $config->getId());
        $this->assertEquals($params['server'] . '.suretly.io', $config->getHost());
        $this->assertEquals($params['version'], $config->getVersion());
    }

    /**
     * @dataProvider paramsProvider
     * @expectedException \InvalidArgumentException
     */
    public function testValidateVersion($params)
    {
        $config = new Config(array_merge($params, ['version' => '1']));
    }

    /**
     * @dataProvider paramsProvider
     */
    public function testValidatesApiUrl($params)
    {
        $config = new Config($params);
        $url = parse_url($config->getApiURL());

        $this->assertEquals($config->getScheme(), $url['scheme']);
        $this->assertEquals($config->getHost(), $url['host']);
        $this->assertEquals($config->getPort(), $url['port']);
        $this->assertEquals('/' . $config->getVersion(), $url['path']);
    }

    /**
     * @dataProvider paramsProvider
     */
    public function testValidatesAuth($params)
    {
        $config = new Config($params);

        $this->assertNotEmpty($config->getAuthToken());
    }


    /**
     * @dataProvider paramsProvider
     */
    public function testValidateUserAgent($params)
    {
        $config = new Config($params);

        $this->assertNotEmpty($config->getUserAgent());
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
                    'server' => 'develop',
                    'version' => 'v2'
                ]
            ]
        ];
    }
}