<?php

namespace MonobankAPI\Progjp\Response;

class AccountDTO
{
    /** @var string */
    private $id;
    /** @var int */
    private $balance;
    /** @var int */
    private $creditLimit;
    /** @var int */
    private $currencyCode;
    /** @var string */
    private $cashbackType;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return AccountDTO
     */
    public function setId(string $id): AccountDTO
    {
        $this->id = $id;

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
     * @return AccountDTO
     */
    public function setBalance(int $balance): AccountDTO
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreditLimit(): int
    {
        return $this->creditLimit;
    }

    /**
     * @param int $creditLimit
     * @return AccountDTO
     */
    public function setCreditLimit(int $creditLimit): AccountDTO
    {
        $this->creditLimit = $creditLimit;

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
     * @return AccountDTO
     */
    public function setCurrencyCode(int $currencyCode): AccountDTO
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCashbackType(): string
    {
        return $this->cashbackType;
    }

    /**
     * @param string $cashbackType
     * @return AccountDTO
     */
    public function setCashbackType(string $cashbackType): AccountDTO
    {
        $this->cashbackType = $cashbackType;
        return $this;
    }
}