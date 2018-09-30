<?php

namespace Suretly\LenderApi\Tests\Model;

use PHPUnit\Framework\TestCase;
use Suretly\LenderApi\Model\Borrower;

/**
 * Class BorrowerTest
 * @package Suretly\LenderApi\Tests\Model
 */
class BorrowerTest extends TestCase
{
    /**
     * @dataProvider paramsProvider
     *
     * @param $params
     * @param $borrowerParams
     * @throws \JsonMapper_Exception
     */
    public function testGetBorrower($params, $borrowerParams)
    {
        /** @var Borrower $borrower */
        $borrower = $this->getBorrower($borrowerParams);

        $this->assertNotEmpty($borrower);
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
                'borrower' => [
                    'name' => [
                        'first' => 'Tim',
                        'middle' => 'Show',
                        'last' => 'Ivanov',
                        'maiden' => 'Targaryen'
                    ],
                    'gender' => '1',
                    'birth' => [
                        'date' => '11.05.1981',
                        'place' => 'Winterfell'
                    ],
                    'email' => 'tsi@targaryen.com',
                    'phone' => '+30001235678',
                    'profile_url' => 'https://www.facebook.com/GameOfThrones/',
                    'photo_url' => 'https://www.google.ru/logos/doodles/2018/world-cup-2018-day-17-6229715604996096.2-law.gif',
                    'city' => 'Novosibirsk',
                    'identity_document_type' => 'passport_rf',
                    'identity_document' => [
                        'series' => '5201',
                        'number' => '2345678',
                        'issue_date' => '01.05.2012',
                        'issue_place' => 'Novosibirsk',
                        'issue_code' => '540-07',
                        'registration' => [
                            'country' => 'Russia',
                            'zip' => '630093',
                            'area' => 'Russia',
                            'city' => 'Novosibirsk',
                            'street' => 'Serebrennikovskaya',
                            'house' => '29',
                            'building' => '1',
                            'flat' => '10'
                        ]
                    ],
                    'residential' => [
                        'country' => 'Russia',
                        'zip' => '630093',
                        'area' => 'Russia',
                        'city' => 'Novosibirsk',
                        'street' => 'Serebrennikovskaya',
                        'house' => '29',
                        'building' => '1',
                        'flat' => '10'
                    ]
                ],
            ]
        ];
    }

    /**
     * @param $borrower
     * @return mixed
     * @throws \JsonMapper_Exception
     */
    private function getBorrower($borrower)
    {
        $jsonMapper = new \JsonMapper();

        return $jsonMapper->map(json_decode(json_encode($borrower)), new Borrower());
    }
}