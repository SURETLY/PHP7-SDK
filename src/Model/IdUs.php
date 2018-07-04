<?php

namespace Suretly\LenderApi\Model;

/**
 * IdUs
 *
 * Class IdUs
 * @package Suretly\LenderApi\Model
 */
class IdUs extends IdentityDocument
{
    /**
     * @var string $ssn Номер
     */
    private $ssn;

    /**
     * @return string
     */
    public function getSsn(): string
    {
        return $this->ssn;
    }

    /**
     * @param string $ssn
     */
    public function setSsn(string $ssn): void
    {
        $this->ssn = $ssn;
    }
}