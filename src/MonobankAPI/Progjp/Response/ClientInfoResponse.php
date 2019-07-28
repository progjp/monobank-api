<?php

namespace MonobankAPI\Progjp\Response;

class ClientInfoResponse
{
    /** @var string */
    private $name;
    /** @var string */
    private $webHookUrl;
    /** @var AccountDTO[] */
    private $accounts;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ClientInfoResponse
     */
    public function setName(string $name): ClientInfoResponse
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebHookUrl(): ?string
    {
        return $this->webHookUrl;
    }

    /**
     * @param string $webHookUrl
     * @return ClientInfoResponse
     */
    public function setWebHookUrl(?string $webHookUrl): ClientInfoResponse
    {
        $this->webHookUrl = $webHookUrl;
        return $this;
    }

    /**
     * @return AccountDTO[]
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * @param AccountDTO[] $accounts
     * @return ClientInfoResponse
     */
    public function setAccounts(array $accounts): ClientInfoResponse
    {
        $this->accounts = $accounts;
        $accountsDTO = [];

        /** @var array $account */
        foreach ($accounts as $account) {
            $accountsDTO[] = (new AccountDTO())
                ->setId($account['id'])
                ->setCurrencyCode($account['currencyCode'])
                ->setCashbackType($account['cashbackType'])
                ->setBalance($account['balance'])
                ->setCreditLimit($account['creditLimit']);
        }
        return $this;
    }


}