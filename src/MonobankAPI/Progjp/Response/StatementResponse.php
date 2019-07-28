<?php

namespace MonobankAPI\Progjp\Response;

class StatementResponse
{
    /** @var string */
    private $id;
    /** @var int */
    private $time;
    /** @var string */
    private $description;
    /** @var int */
    private $mcc;
    /** @var bool */
    private $hold;
    /** @var int */
    private $amount;
    /** @var int */
    private $operationAmount;
    /** @var int */
    private $currencyCode;
    /** @var int */
    private $commissionRate;
    /** @var int */
    private $cashbackAmount;
    /** @var int */
    private $balance;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return StatementResponse
     */
    public function setId(string $id): StatementResponse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $time
     * @return StatementResponse
     */
    public function setTime(int $time): StatementResponse
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return StatementResponse
     */
    public function setDescription(string $description): StatementResponse
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getMcc(): int
    {
        return $this->mcc;
    }

    /**
     * @param int $mcc
     * @return StatementResponse
     */
    public function setMcc(int $mcc): StatementResponse
    {
        $this->mcc = $mcc;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHold(): bool
    {
        return $this->hold;
    }

    /**
     * @param bool $hold
     * @return StatementResponse
     */
    public function setHold(bool $hold): StatementResponse
    {
        $this->hold = $hold;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return StatementResponse
     */
    public function setAmount(int $amount): StatementResponse
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getOperationAmount(): int
    {
        return $this->operationAmount;
    }

    /**
     * @param int $operationAmount
     * @return StatementResponse
     */
    public function setOperationAmount(int $operationAmount): StatementResponse
    {
        $this->operationAmount = $operationAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrencyCode(): int
    {
        return $this->currencyCode;
    }

    /**
     * @param int $currencyCode
     * @return StatementResponse
     */
    public function setCurrencyCode(int $currencyCode): StatementResponse
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommissionRate(): int
    {
        return $this->commissionRate;
    }

    /**
     * @param int $commissionRate
     * @return StatementResponse
     */
    public function setCommissionRate(int $commissionRate): StatementResponse
    {
        $this->commissionRate = $commissionRate;
        return $this;
    }

    /**
     * @return int
     */
    public function getCashbackAmount(): int
    {
        return $this->cashbackAmount;
    }

    /**
     * @param int $cashbackAmount
     * @return StatementResponse
     */
    public function setCashbackAmount(int $cashbackAmount): StatementResponse
    {
        $this->cashbackAmount = $cashbackAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     * @return StatementResponse
     */
    public function setBalance(int $balance): StatementResponse
    {
        $this->balance = $balance;
        return $this;
    }
}