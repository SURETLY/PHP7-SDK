<?php

use Suretly\LenderApi\LenderManager;

// Если autoload не был загружен ранее, полключите его
require __DIR__ . '/../vendor/autoload.php';

// Создание основного класса SDK
$sdk = LenderManager::create('59ca100acea0997574cef785', '317', 'develop');

/**
 * @return object
 * @throws JsonMapper_Exception
 */
function getNewOrder()
{
    $orderParams = [
        'uid' => '100500',
        'is_public' => true,
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
        'credit_score_type' => 'default',
        'user_credit_score' => 10,
        'loan_sum' => 50.00,
        'loan_term' => 30,
        'loan_rate' => 56.34,
        'currency_code' => 'RUB'
    ];

    $jsonMapper = new \JsonMapper();
    return $jsonMapper->map(json_decode(json_encode($orderParams)), new \Suretly\LenderApi\Model\NewOrder());
}

try {

    // Получаем(или создаем) новую заявку
    $newOrder = getNewOrder();

    echo "\nПолучаем лимиты на заявку...";
    $options = $sdk->getOptions();
    sleep(2);
    echo "\nПринимаем заявку на «Микрозайм под поручительство» соответствующую лимитам...";
    sleep(2);
    echo "\nИдентифицируем Заемщика...";
    sleep(2);
    echo "\nОтправляем Suretly данные договора займа...";
    $orderID = $sdk->postNewOrder($newOrder)->id;
    sleep(1);
    echo "\nПолучаем договор для Заемщика";
    $sdk->getContract($orderID);
    sleep(1);
    echo "\nОжидаем подтверждения от Заёмщика";
    sleep(2);

    $r = mt_rand(0, 100);
    if ($r >= 10) {
        echo "\nПрикрепляем фото заемщика к заявке id: " . $orderID;
        $sdk->postUploadImageOrder($orderID, __DIR__ . '/assets/avatar.png');
        sleep(5);
        echo "\nЗаемщик подписал договор";
        $sdk->postContractAccept($orderID);
        echo "\nИдет поиск поручителей...\n";
    } else {
        echo "\nОтказ заемщика";
        $sdk->postOrderStop($orderID);
        exit();
    }

    do {
        $orderStatus = $sdk->getOrderStatus($orderID);
        print_r($orderStatus);
        sleep(3);

        switch ($orderStatus->getStatus()) {
            case 2:
                echo "\nПоиск поручителей остановлен заемщиком";
                exit();
                break;
            case 3:
                echo "\nЗаявка остановлена, по истечению времени, сумма не набрана";
                exit();
                break;
            case 4:
                echo "\nЗаявка успешно завершена, сумма набрана";
                break;
        }

    } while ($orderStatus->getStatus() != 4);

    if (mt_rand(0, 1)) {
        echo "\nЗаявка оплачена и выдана ";
        $sdk->postOrderIssued($orderID);

    } else {
        echo "\nОтказ заемщика";
        $sdk->postOrderStop($orderID);
        exit();
    }
    echo "\nОжидание возврата займа...";
    sleep(5);

    switch (mt_rand(0, 2)) {
        case 0:
            $sdk->postOrderUnpaid($orderID);
            echo "\nЗайм не выплачен";
            break;
        case 1:
            $sdk->postOrderPaid($orderID);
            echo "\nЗайм оплачен полностью";
            break;
        case 2:
            $sdk->postOrderPartialPaid($orderID, mt_rand(100, 500));
            echo "\nЗайм оплачен частично";
            break;
    }
} catch (\Exception $exception) {
    echo $exception->getMessage();
}