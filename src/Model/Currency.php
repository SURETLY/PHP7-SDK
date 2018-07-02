<?php

namespace Suretly\LenderApi\Model;

/**
 * Валюта
 *
 * Class Currency
 * @package Suretly\LenderApi\Model
 */
class Currency
{
    /**
     * @var string $code Код валюты
     */
    private $code;

    /**
     * @var string $name Название валюты
     */
    private $name;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}