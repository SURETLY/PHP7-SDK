<?php

namespace Suretly\LenderApi\Type;

/**
 * Class OrderStatusType
 * @package Suretly\LenderApi\Type
 */
class OrderStatusType extends AbstractEnumType
{
    const STATUS_0 = '0';
    const STATUS_1 = '1';
    const STATUS_2 = '2';
    const STATUS_3 = '3';
    const STATUS_4 = '4';
    const STATUS_6 = '6';
    const STATUS_10 = '10';
    const STATUS_12 = '12';
    const STATUS_13 = '13';
    const STATUS_14 = '14';

    public static $choices = [
        self::STATUS_0 => 'Не опубликованная (новая), ждет акцепта договора',
        self::STATUS_1 => 'Идет поиск поручителей',
        self::STATUS_2 => 'Поиск поручителей остановлен заемщиком',
        self::STATUS_3 => 'Заявка остановлена, по истечению времени, сумма не набрана',
        self::STATUS_4 => 'Заявка успешно завершена, сумма набрана',
        self::STATUS_6 => 'Займ выдан заемщику (ждет возврата)',
        self::STATUS_10 => 'Займ просрочен',
        self::STATUS_12 => 'Займ выплачен',
        self::STATUS_13 => 'Займ не отдан (дефолт)',
        self::STATUS_14 => 'Займ выплачен после дефолта',
    ];
}