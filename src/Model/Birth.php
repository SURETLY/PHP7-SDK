<?php

namespace Suretly\LenderApi\Model;

/**
 * Дата и место рождения
 *
 * Class Birth
 * @package Suretly\LenderApi\Model
 */
class Birth implements \JsonSerializable
{
    /**
     * @var string $date Дата рождения
     */
    private $date;

    /**
     * @var string $place Место
     */
    private $place;

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace(string $place): void
    {
        $this->place = $place;
    }
}