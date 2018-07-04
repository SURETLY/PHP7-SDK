<?php

namespace Suretly\LenderApi\Type;

/**
 * Class IdentityDocumentType
 * @package Suretly\LenderApi\Type
 */
class IdentityDocumentType extends AbstractEnumType
{
    const PASSPORT_RF = 'passport_rf';
    const ID_KZ = 'id_kz';
    const ID_US = 'id_us';
    const ID_MX = 'id_mx';
    const SSN = 'ssn';

    public static $choices = [
        self::PASSPORT_RF => 'Российский паспорт',
        self::ID_KZ => 'Паспорт Казахстана',
        self::ID_US => 'Паспорт сша',
        self::ID_MX => 'Паспорт мексики',
        self::SSN => 'SSN',
    ];
}