<?php

namespace Suretly\LenderApi\Model;

/**
 * Class PassportRF
 * @package Suretly\LenderApi\Model
 */
class PassportRF extends IdentityDocument
{
    /**
     * @var string $series Серия
     */
    private $series;

    /**
     * @var string $number Номер
     */
    private $number;

    /**
     * @var string $issue_date Дата выдачи
     */
    private $issue_date;

    /**
     * @var string $issue_place Место выдачи
     */
    private $issue_place;

    /**
     * @var string $issue_code Код подразделения
     */
    private $issue_code;

    /**
     * @var Address $registration Адрес прописки
     */
    private $registration;

    /**
     * @return string
     */
    public function getSeries(): string
    {
        return $this->series;
    }

    /**
     * @param string $series
     */
    public function setSeries(string $series): void
    {
        $this->series = $series;
    }

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
    public function getIssueCode(): string
    {
        return $this->issue_code;
    }

    /**
     * @param string $issue_code
     */
    public function setIssueCode(string $issue_code): void
    {
        $this->issue_code = $issue_code;
    }

    /**
     * @return Address
     */
    public function getRegistration(): Address
    {
        return $this->registration;
    }

    /**
     * @param Address $registration
     */
    public function setRegistration(Address $registration): void
    {
        $this->registration = $registration;
    }
}