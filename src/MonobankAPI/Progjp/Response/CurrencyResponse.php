<?php

namespace MonobankAPI\Progjp\Response;

class CurrencyResponse
{
    /** @var int */
    private $currencyCodeA;
    /** @var int */
    private $currencyCodeB;
    /** @var int */
    private $date;
    /** @var int */
    private $rateSell;
    /** @var double */
    private $rateBuy;
    /** @var double */
    private $rateCross;

    /**
     * @return int
     */
    public function getCurrencyCodeA(): int
    {
        return $this->currencyCodeA;
    }

    /**
     * @param int $currencyCodeA
     * @return CurrencyResponse
     */
    public function setCurrencyCodeA(int $currencyCodeA): CurrencyResponse
    {
        $this->currencyCodeA = $currencyCodeA;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrencyCodeB(): int
    {
        return $this->currencyCodeB;
    }

    /**
     * @param int $currencyCodeB
     * @return CurrencyResponse
     */
    public function setCurrencyCodeB(int $currencyCodeB): CurrencyResponse
    {
        $this->currencyCodeB = $currencyCodeB;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return CurrencyResponse
     */
    public function setDate(int $date): CurrencyResponse
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getRateSell(): ?int
    {
        return $this->rateSell;
    }

    /**
     * @param int $rateSell
     * @return CurrencyResponse
     */
    public function setRateSell(?int $rateSell): CurrencyResponse
    {
        $this->rateSell = $rateSell;
        return $this;
    }

    /**
     * @return float
     */
    public function getRateBuy(): ?float
    {
        return $this->rateBuy;
    }

    /**
     * @param float $rateBuy
     * @return CurrencyResponse
     */
    public function setRateBuy(?float $rateBuy): CurrencyResponse
    {
        $this->rateBuy = $rateBuy;
        return $this;
    }

    /**
     * @return float
     */
    public function getRateCross(): ?float
    {
        return $this->rateCross;
    }

    /**
     * @param float $rateCross
     * @return CurrencyResponse
     */
    public function setRateCross(?float $rateCross): CurrencyResponse
    {
        $this->rateCross = $rateCross;
        return $this;
    }
}