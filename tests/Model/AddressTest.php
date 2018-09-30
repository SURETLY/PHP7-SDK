<?php

namespace Suretly\LenderApi\Tests\Model;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\Model\Address;

/**
 * Class AddressTest
 * @package Suretly\LenderApi\Tests\Model
 */
class AddressTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $addressParams
     * @throws \JsonMapper_Exception
     */
    public function testGetAddress($params, $addressParams)
    {
        /** @var Address $address */
        $address = $this->getAddress($addressParams);

        $this->assertNotEmpty($address);
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
                ],
                'address' => [
                    'country' => 'Russia',
                    'zip' => '630093',
                    'area' => 'Russia',
                    'city' => 'Novosibirsk',
                    'street' => 'Serebrennikovskaya',
                    'house' => '29',
                    'building' => '1',
                    'flat' => '10'
                ]
            ]
        ];
    }

    /**
     * @param $address
     * @return mixed
     * @throws \JsonMapper_Exception
     */
    private function getAddress($address)
    {
        $jsonMapper = new \JsonMapper();

        return $jsonMapper->map(json_decode(json_encode($address)), new Address());
    }
}