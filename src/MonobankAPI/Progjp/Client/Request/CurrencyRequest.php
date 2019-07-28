<?php

namespace MonobankAPI\Progjp\Client\Request;

use MonobankAPI\Progjp\Response\CurrencyResponse;
use Psr\Http\Message\ResponseInterface;

class CurrencyRequest extends AbstractRequest implements MonoBankRequest
{
    /** @var string  */
    const URL = '/bank/currency';

    public function __construct()
    {
        $this->setEndpointURL(self::URL);
    }

    public function getResponse(ResponseInterface $response): array
    {
        $response = json_decode($response->getBody()->getContents(), true);

        $currencyRates = [];
        foreach ($response as $currency) {
            $currencyRates[] = (new CurrencyResponse())
                ->setCurrencyCodeA($currency['currencyCodeA'])
                ->setCurrencyCodeB($currency['currencyCodeB'])
                ->setDate($currency['date'])
                ->setRateCross($currency['rateCross'] ?? null)
                ->setRateBuy($currency['rateBuy'] ?? null)
                ->setRateSell($currency['rateShell'] ?? null);
        }

        return $currencyRates;
    }
}