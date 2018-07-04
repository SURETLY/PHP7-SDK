<?php

namespace SuretlySDK\Type;

use Suretly\LenderApi\Type\AbstractEnumType;

/**
 * Class ResponseErrorStatusType
 * @package SuretlySDK\Type
 */
class ResponseErrorStatusType extends AbstractEnumType
{
    const SUCCESS = 'success';
    const BUSINESS_CONFLICT = 'business_conflict';
    const UNPROCESSABLE_ENTITY = 'unprocessable_entity';
    const BAD_PARAMETERS = 'bad_parameters';
    const INTERNAL_ERROR = 'internal_error';
    const NOT_FOUND = 'not_found';
    const SECURITY_ERROR = 'security_error';
    const PERMISSION_ERROR = 'permission_error';

    public static $choices = [
        self::SUCCESS => 200,
        self::BUSINESS_CONFLICT => 409,
        self::UNPROCESSABLE_ENTITY => 422,
        self::BAD_PARAMETERS => 400,
        self::INTERNAL_ERROR => 500,
        self::NOT_FOUND => 404,
        self::SECURITY_ERROR => 401,
        self::PERMISSION_ERROR => 403
    ];
}