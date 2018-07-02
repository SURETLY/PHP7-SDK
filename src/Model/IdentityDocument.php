<?php

namespace Suretly\LenderApi\Model;

/**
 * Базовая сущность для паспорта ID
 *
 * Class IdentityDocument
 * @package Suretly\LenderApi\Model
 */
class IdentityDocument implements \JsonSerializable
{
    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}