<?php

namespace Suretly\LenderApi\Model;

/**
 * Имя
 *
 * Class Name
 * @package Suretly\LenderApi\Model
 */
class Name implements \JsonSerializable
{
    /**
     * @var string $first Имя
     */
    private $first;

    /**
     * @var string $middle Отчество
     */
    private $middle;

    /**
     * @var string $last Фамилия
     */
    private $last;

    /**
     * @var string $maiden Фамилия до брака
     */
    private $maiden;


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
    public function getFirst(): string
    {
        return $this->first;
    }

    /**
     * @param string $first
     */
    public function setFirst(string $first): void
    {
        $this->first = $first;
    }

    /**
     * @return null|string
     */
    public function getMiddle(): ?string
    {
        return $this->middle;
    }

    /**
     * @param null|string $middle
     */
    public function setMiddle(?string $middle): void
    {
        $this->middle = $middle;
    }

    /**
     * @return string
     */
    public function getLast(): string
    {
        return $this->last;
    }

    /**
     * @param string $last
     */
    public function setLast(string $last): void
    {
        $this->last = $last;
    }

    /**
     * @return null|string
     */
    public function getMaiden(): ?string
    {
        return $this->maiden;
    }

    /**
     * @param null|string $maiden
     */
    public function setMaiden(?string $maiden): void
    {
        $this->maiden = $maiden;
    }
}