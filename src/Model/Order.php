<?php

namespace Suretly\LenderApi\Model;

/**
 * Заявка на займ
 *
 * Class Order
 * @package Suretly\LenderApi\Model
 */
class Order
{
    /**
     * @var string $id Идентификатор заявки
     */
    private $id;

    /**
     * @var string $uid Ваш внутренний id заявки (опциональный)
     */
    private $uid;

    /**
     * @var integer $status Статус заявки
     */
    private $status;

    /**
     * @var boolean $is_public Доступна ли заявка публично
     */
    private $is_public;

    /**
     * @var Borrower $borrower Информация о заемщике
     */
    private $borrower;

    /**
     * @var integer $user_credit_score Скоринг пользователя
     */
    private $user_credit_score;

    /**
     * @var float $loan_sum Сумма займа
     */
    private $loan_sum;

    /**
     * @var integer $loan_term Срок в днях
     */
    private $loan_term;

    /**
     * @var float $loan_rate Процентная ставка
     */
    private $loan_rate;

    /**
     * @var string $currency_code Код валюты
     */
    private $currency_code;

    /**
     * @var string $callback Url callback (http://server.ru/?id=******)
     */
    private $callback;

    /**
     * @var float $cost Стоимость поручительства
     */
    private $cost;

    /**
     * @var integer $max_wait_time Сколько времени искать заемщиков (сек)
     */
    private $max_wait_time;

    /**
     * @var integer $created_at Дата создания
     */
    private $created_at;

    /**
     * @var integer $createdAt Дата редактирования
     */
    private $modify_at;

    /**
     * @var integer $createdAt Дата закрытия
     */
    private $closed_at;

    /**
     * @var integer Сколько найдено поручителей
     */
    private $bids_count;

    /**
     * @var float $bids_sum Сумма поручительств
     */
    private $bids_sum;

    /**
     * @var string $payment_link Ссылка для оплаты вознаграждения или для оплаты долга на сайте Suretly (изменяется в зависимости от статуса)
     */
    private $payment_link;

    /**
     * @var float $fee_total Полная сумма вознаграждения поручителям
     */
    private $fee_total;

    /**
     * @var float $fee_paid Оплаченная заемщиком сумма вознаграждения поручителям.
     */
    private $fee_paid;

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
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     */
    public function setUid(string $uid): void
    {
        $this->uid = $uid;
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
    public function getIsPublic(): bool
    {
        return $this->is_public;
    }

    /**
     * @param bool $is_public
     */
    public function setIsPublic(bool $is_public): void
    {
        $this->is_public = $is_public;
    }

    /**
     * @return Borrower
     */
    public function getBorrower(): Borrower
    {
        return $this->borrower;
    }

    /**
     * @param Borrower $borrower
     */
    public function setBorrower(Borrower $borrower): void
    {
        $this->borrower = $borrower;
    }

    /**
     * @return int
     */
    public function getUserCreditScore(): int
    {
        return $this->user_credit_score;
    }

    /**
     * @param int $user_credit_score
     */
    public function setUserCreditScore(int $user_credit_score): void
    {
        $this->user_credit_score = $user_credit_score;
    }

    /**
     * @return float
     */
    public function getLoanSum(): float
    {
        return $this->loan_sum;
    }

    /**
     * @param float $loan_sum
     */
    public function setLoanSum(float $loan_sum): void
    {
        $this->loan_sum = $loan_sum;
    }

    /**
     * @return int
     */
    public function getLoanTerm(): int
    {
        return $this->loan_term;
    }

    /**
     * @param int $loan_term
     */
    public function setLoanTerm(int $loan_term): void
    {
        $this->loan_term = $loan_term;
    }

    /**
     * @return float
     */
    public function getLoanRate(): float
    {
        return $this->loan_rate;
    }

    /**
     * @param float $loan_rate
     */
    public function setLoanRate(float $loan_rate): void
    {
        $this->loan_rate = $loan_rate;
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

    /**
     * @return string
     */
    public function getCallback(): string
    {
        return $this->callback;
    }

    /**
     * @param string $callback
     */
    public function setCallback(string $callback): void
    {
        $this->callback = $callback;
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
    public function getMaxWaitTime(): int
    {
        return $this->max_wait_time;
    }

    /**
     * @param int $max_wait_time
     */
    public function setMaxWaitTime(int $max_wait_time): void
    {
        $this->max_wait_time = $max_wait_time;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    /**
     * @param int $created_at
     */
    public function setCreatedAt(int $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return int
     */
    public function getModifyAt(): int
    {
        return $this->modify_at;
    }

    /**
     * @param int $modify_at
     */
    public function setModifyAt(int $modify_at): void
    {
        $this->modify_at = $modify_at;
    }

    /**
     * @return int
     */
    public function getClosedAt(): int
    {
        return $this->closed_at;
    }

    /**
     * @param int $closed_at
     */
    public function setClosedAt(int $closed_at): void
    {
        $this->closed_at = $closed_at;
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
     * @return float
     */
    public function getBidsSum(): float
    {
        return $this->bids_sum;
    }

    /**
     * @param float $bids_sum
     */
    public function setBidsSum(float $bids_sum): void
    {
        $this->bids_sum = $bids_sum;
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
}