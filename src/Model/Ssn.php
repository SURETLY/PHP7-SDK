<?php

namespace Suretly\LenderApi\Model;

/**
 * Ssn
 *
 * Class Ssn
 * @package Suretly\LenderApi\Model
 */
class Ssn extends IdentityDocument
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