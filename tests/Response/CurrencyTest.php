<?php

declare(strict_types=1);

namespace Tests\MonobankAPI;

use GuzzleHttp\Client;
use MonobankAPI\Progjp\Client\Request\CurrencyRequest;
use MonobankAPI\Progjp\Response\CurrencyResponse;
use PHPUnit\Framework\TestCase;
use MonobankAPI\Progjp\MonobankAPI;

class CurrencyTest extends TestCase
{
    public function testCreatingFromResponse()
    {
        $client = new Client();
        $monobank = new MonobankAPI($client);

        /** @var CurrencyResponse[] $response */
        $response = $monobank->call(new CurrencyRequest());

        $this->assertIsArray($response);
        $this->assertNotEmpty($response);
        $this->assertSame(CurrencyResponse::class, get_class($response[0]));
        $this->assertNotEmpty($response[0]->getCurrencyCodeA());
        $this->assertNotEmpty($response[0]->getCurrencyCodeB());
        $this->assertNotEmpty($response[0]->getDate());
        $this->assertNotEmpty($response[0]->getRateBuy());
    }
}
