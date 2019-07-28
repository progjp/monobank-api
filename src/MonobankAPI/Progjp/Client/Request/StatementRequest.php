<?php

namespace MonobankAPI\Progjp\Client\Request;

use MonobankAPI\Progjp\DTO\StatementDTO;
use MonobankAPI\Progjp\Response\StatementResponse;
use Psr\Http\Message\ResponseInterface;

class StatementRequest extends AbstractRequest implements MonoBankRequest
{
    /** @var string  */
    const URL = '/personal/statement/%s/%s';

    /** @var string  */
    private $endpointURL;

    /** @var StatementDTO */
    private $statementDTO;

    public function __construct(StatementDTO $statementDTO)
    {
        $this->statementDTO = $statementDTO;
        $this->endpointURL = $this->buildRequestUri();
    }

    public function buildRequestUri(): string
    {
        $statementDTO = $this->statementDTO;
        $url = self::URL;
        if (!empty($this->statementDTO->getTo())) {
            $url .= '/%s';

            return sprintf($url, $statementDTO->getAccount(), $statementDTO->getFrom(), $statementDTO->getTo());
        }

        return sprintf($url, $statementDTO->getAccount(), $statementDTO->getFrom());
    }

    /**
     * @return string
     */
    public function getEndpointURL(): string
    {
        $statementDTO = $this->statementDTO;
        $url = self::URL;
        if (!empty($this->statementDTO->getTo())) {
            $url .= '/%s';

            return sprintf($url, $statementDTO->getAccount(), $statementDTO->getFrom(), $statementDTO->getTo());
        }

        return sprintf($url, $statementDTO->getAccount(), $statementDTO->getFrom());
    }

    public function getResponse(ResponseInterface $response): array
    {
        $response = json_decode($response->getBody()->getContents(), true);

        $statements = [];
        foreach ($response as $statment){
            $statements[] = (new StatementResponse())
                ->setId($statment['id'])
                ->setTime($statment['time'])
                ->setDescription($statment['description'])
                ->setMcc($statment['mcc'])
                ->setHold($statment['hold'])
                ->setAmount($statment['amount'])
                ->setOperationAmount($statment['operationAmount'])
                ->setCurrencyCode($statment['currencyCode'])
                ->setCommissionRate($statment['commissionRate'])
                ->setCashbackAmount($statment['cashbackAmount'])
                ->setBalance($statment['balance']);
        }

        return $statements;
    }
}