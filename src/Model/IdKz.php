<?php

namespace Suretly\LenderApi\Model;

/**
 * Казахский паспорт (ID)
 *
 * Class IdKz
 * @package Suretly\LenderApi\Model
 */
class IdKz extends IdentityDocument
{
    /**
     * @var string $number Номер
     */
    private $number;

    /**
     * @var string $iin ИИН
     */
    private $iin;

    /**
     * @var string $issue_date Дата выдачи
     */
    private $issue_date;

    /**
     * @var string $issue_place Место выдачи
     */
    private $issue_place;

    /**
     * @var string $expire_date Срок действия
     */
    private $expire_date;

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getIin(): string
    {
        return $this->iin;
    }

    /**
     * @param string $iin
     */
    public function setIin(string $iin): void
    {
        $this->iin = $iin;
    }

    /**
     * @return string
     */
    public function getIssueDate(): string
    {
        return $this->issue_date;
    }

    /**
     * @param string $issue_date
     */
    public function setIssueDate(string $issue_date): void
    {
        $this->issue_date = $issue_date;
    }

    /**
     * @return string
     */
    public function getIssuePlace(): string
    {
        return $this->issue_place;
    }

    /**
     * @param string $issue_place
     */
    public function setIssuePlace(string $issue_place): void
    {
        $this->issue_place = $issue_place;
    }

    /**
     * @return string
     */
    public function getExpireDate(): string
    {
        return $this->expire_date;
    }

    /**
     * @param string $expire_date
     */
    public function setExpireDate(string $expire_date): void
    {
        $this->expire_date = $expire_date;
    }
}