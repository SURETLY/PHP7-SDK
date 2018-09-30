<?php

namespace Suretly\LenderApi\Tests\Api;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\LenderManager;

/**
 * Class OptionsApiTest
 * @package Suretly\LenderApi\Tests\Api
 */
class OptionsApiTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @throws \JsonMapper_Exception
     * @throws \Suretly\LenderApi\Exception\ResponseErrorException
     */
    public function testGetOptions($params)
    {
        $manager = new LenderManager($params);
        $options = $manager->getOptions();

        $this->assertGreaterThanOrEqual(0, $options->getMinTerm(), 'Wrong min_term');
        $this->assertGreaterThanOrEqual(0, $options->getMaxTerm(), 'Wrong max_term');
        $this->assertGreaterThanOrEqual(0, $options->getMinProlong(), 'Wrong min_prolong');
        $this->assertGreaterThanOrEqual(0, $options->getMaxProlong(), 'Wrong max_prolong');
        $this->assertGreaterThanOrEqual(0.0, $options->getMinSum(), 'Wrong min_sum');
        $this->assertGreaterThanOrEqual(0.0, $options->getMaxSum(), 'Wrong max_sum');
        $this->assertGreaterThanOrEqual(0, $options->getServerTime(), 'Wrong server_time');
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