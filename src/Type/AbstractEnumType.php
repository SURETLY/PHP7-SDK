<?php

namespace Suretly\LenderApi\Type;

/**
 * Class AbstractEnumType
 * @package Suretly\LenderApi\Type
 */
abstract class AbstractEnumType
{
    /**
     * @var array
     */
    public static $choices = [];

    /**
     * @param $choice
     * @return mixed
     */
    public static function getChoices($choice)
    {
        return static::$choices[$choice];
    }
}