<?php

namespace Suretly\LenderApi\Model;

/**
 * Текущий статус заявки
 *
 * Class OrderStatus
 * @package Suretly\LenderApi\Model
 */
class OrderStatus
{
    /**
     * @var string $id Идентификатор заявки
     */
    private $id;

    /**
     * @var int $status Статус
     */
    private $status;

    /**
     * @var boolean $public Доступна ли заявка публично
     */
    private $public;

    /**
     * @var float $sum Сумма на которую уже поручились поручители к текущему моменту
     */
    private $sum;

    /**
     * @var float $cost текущая стоимость услуг поручителей для заемщика
     */
    private $cost;

    /**
     * @var int $bids_count сколько найдено поручителей
     */
    private $bids_count;

    /**
     * @var int $stop_time время до окончания сбора средств
     */
    private $stop_time;

    /**
     * @var float $fee_total сумма вознаграждений за поручительство по текущей заявке
     */
    private $fee_total;

    /**
     * @var float $fee_paid оплаченно вознагражденй
     */
    private $fee_paid;

    /**
     * @var string $payment_link Ссылка для оплаты вознаграждения или для оплаты долга на сайте Suretly (изменяется в зависимости от статуса)
     */
    private $payment_link;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->public;
    }

    /**
     * @param bool $public
     */
    public function setPublic(bool $public): void
    {
        $this->public = $public;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     */
    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     */
    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    /**
     * @return int
     */
    public function getBidsCount(): int
    {
        return $this->bids_count;
    }

    /**
     * @param int $bids_count
     */
    public function setBidsCount(int $bids_count): void
    {
        $this->bids_count = $bids_count;
    }

    /**
     * @return int
     */
    public function getStopTime(): int
    {
        return $this->stop_time;
    }

    /**
     * @param int $stop_time
     */
    public function setStopTime(int $stop_time): void
    {
        $this->stop_time = $stop_time;
    }

    /**
     * @return float
     */
    public function getFeeTotal(): float
    {
        return $this->fee_total;
    }

    /**
     * @param float $fee_total
     */
    public function setFeeTotal(float $fee_total): void
    {
        $this->fee_total = $fee_total;
    }

    /**
     * @return float
     */
    public function getFeePaid(): float
    {
        return $this->fee_paid;
    }

    /**
     * @param float $fee_paid
     */
    public function setFeePaid(float $fee_paid): void
    {
        $this->fee_paid = $fee_paid;
    }

    /**
     * @return string
     */
    public function getPaymentLink(): string
    {
        return $this->payment_link;
    }

    /**
     * @param string $payment_link
     */
    public function setPaymentLink(string $payment_link): void
    {
        $this->payment_link = $payment_link;
    }
}