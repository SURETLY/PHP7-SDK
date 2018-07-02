<?php

namespace Suretly\LenderApi\Model;

/**
 * Страна
 *
 * Class Country
 * @package Suretly\LenderApi\Model
 */
class Country
{
    /**
     * @var string $code Код страны
     */
    private $code;

    /**
     * @var string $name Название страны
     */
    private $name;

    /**
     * @var string $currency_code Код валюты страны
     */
    private $currency_code;

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

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currency_code;
    }

    /**
     * @param string $currency_code
     */
    public function setCurrencyCode(string $currency_code): void
    {
        $this->currency_code = $currency_code;
    }
}