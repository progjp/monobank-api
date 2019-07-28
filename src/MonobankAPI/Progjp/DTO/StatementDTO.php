<?php

namespace MonobankAPI\Progjp\DTO;

class StatementDTO implements MonoBankDTO
{
    /** @var string */
    private $account;

    /** @var string */
    private $from;

    /** @var string */
    private $to;

    /**
     * @return string
     */
    public function getAccount(): string
    {
        return $this->account;
    }

    /**
     * @param string $account
     *
     * @return StatementDTO
     */
    public function setAccount(string $account): self
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     *
     * @return StatementDTO
     */
    public function setFrom(string $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     *
     * @return StatementDTO
     */
    public function setTo(string $to): self
    {
        $this->to = $to;

        return $this;
    }
}