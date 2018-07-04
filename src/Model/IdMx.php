<?php

namespace Suretly\LenderApi\Model;

/**
 * IdMx
 *
 * Class IdMx
 * @package Suretly\LenderApi\Model
 */
class IdMx extends IdentityDocument
{
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
     * @var string $expire_date Дата оканчания
     */
    private $expire_date;

    /**
     * @var string $authority Authority
     */
    private $authority;

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

    /**
     * @return string
     */
    public function getAuthority(): string
    {
        return $this->authority;
    }

    /**
     * @param string $authority
     */
    public function setAuthority(string $authority): void
    {
        $this->authority = $authority;
    }
}