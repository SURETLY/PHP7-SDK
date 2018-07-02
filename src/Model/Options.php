<?php

namespace Suretly\LenderApi\Model;

/**
 * Параметры для поиска поручителей
 *
 * Class Options
 * @package Suretly\LenderApi\Model
 */
class Options
{
    /**
     * @var int $min_term Минимальный срок займа доступный для формирования завки, дни
     */
    private $min_term;

    /**
     * @var int $max_term Максимальный срок займа доступный для формирования завки, дни
     */
    private $max_term;

    /**
     * @var int $min_prolong Минимальный доступный срок для каждой пролонгации займа, дни
     */
    private $min_prolong;

    /**
     * @var int $max_prolong Максимальный доступный срок для каждой пролонгации займа, дни
     */
    private $max_prolong;

    /**
     * @var float $min_sum Минимальная сумма доступная для формирования завки
     */
    private $min_sum;

    /**
     * @var float $max_sum Максимальная сумма доступная для формирования завки
     */
    private $max_sum;

    /**
     * @var int $server_time Unixtime время на сервере, для синхронизации
     */
    private $server_time;

    /**
     * @return int
     */
    public function getMinTerm(): int
    {
        return $this->min_term;
    }

    /**
     * @param int $min_term
     */
    public function setMinTerm(int $min_term): void
    {
        $this->min_term = $min_term;
    }

    /**
     * @return int
     */
    public function getMaxTerm(): int
    {
        return $this->max_term;
    }

    /**
     * @param int $max_term
     */
    public function setMaxTerm(int $max_term): void
    {
        $this->max_term = $max_term;
    }

    /**
     * @return int
     */
    public function getMinProlong(): int
    {
        return $this->min_prolong;
    }

    /**
     * @param int $min_prolong
     */
    public function setMinProlong(int $min_prolong): void
    {
        $this->min_prolong = $min_prolong;
    }

    /**
     * @return int
     */
    public function getMaxProlong(): int
    {
        return $this->max_prolong;
    }

    /**
     * @param int $max_prolong
     */
    public function setMaxProlong(int $max_prolong): void
    {
        $this->max_prolong = $max_prolong;
    }

    /**
     * @return float
     */
    public function getMinSum(): float
    {
        return $this->min_sum;
    }

    /**
     * @param float $min_sum
     */
    public function setMinSum(float $min_sum): void
    {
        $this->min_sum = $min_sum;
    }

    /**
     * @return float
     */
    public function getMaxSum(): float
    {
        return $this->max_sum;
    }

    /**
     * @param float $max_sum
     */
    public function setMaxSum(float $max_sum): void
    {
        $this->max_sum = $max_sum;
    }

    /**
     * @return int
     */
    public function getServerTime(): int
    {
        return $this->server_time;
    }

    /**
     * @param int $server_time
     */
    public function setServerTime(int $server_time): void
    {
        $this->server_time = $server_time;
    }
}