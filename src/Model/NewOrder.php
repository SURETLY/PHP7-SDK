<?php

namespace Suretly\LenderApi\Model;

/**
 * Создание новой заяаки
 *
 * Class NewOrder
 * @package Suretly\LenderApi\Model
 */
class NewOrder implements \JsonSerializable
{
    /**
     * @var string $uid Ваш внутренний id заявки, опциональный
     */
    private $uid;

    /**
     * @var bool $is_public Доступна ли заявка публично
     */
    private $is_public;

    /**
     * @var Borrower $borrower Информация о заемщике
     */
    private $borrower;

    /**
     * @var string $credit_score_type Тип скоринга
     */
    private $credit_score_type;

    /**
     * @var int $user_credit_score Скоринг заемщика
     */
    private $user_credit_score;

    /**
     * @var float $loan_sum сумма Займа
     */
    private $loan_sum;

    /**
     * @var int $loan_term Срок в днях
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
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return null|string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param null|string $uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * @return bool
     */
    public function getPublic(): bool
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
     * @return string
     */
    public function getCreditScoreType(): string
    {
        return $this->credit_score_type;
    }

    /**
     * @param string $credit_score_type
     */
    public function setCreditScoreType(string $credit_score_type): void
    {
        $this->credit_score_type = $credit_score_type;
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
}