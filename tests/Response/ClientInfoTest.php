<?php

declare(strict_types=1);

namespace Tests\MonobankAPI;

use GuzzleHttp\Client;
use \stdClass;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use MonobankAPI\Progjp\Client\Request\ClientInfoRequest;
use MonobankAPI\Progjp\Response\ClientInfoResponse;
use PHPUnit\Framework\TestCase;
use MonobankAPI\Progjp\MonobankAPI;

class ClientInfoTest extends TestCase
{
    public function testCreatingFromResponse()
    {
        $data = (new stdClass());
        $data->name = 'Test';
        $data->webHookUrl = 'https://test.com';
        $data->accounts = [
            [
                'id' => 'id',
                'balance' => 5000,
                'creditLimit' => 5000,
                'currencyCode' => 1,
                'cashbackType' => 'test']
        ];

        $clientResponse = (new ClientInfoResponse())
            ->setName($data->name)
            ->setWebHookUrl($data->webHookUrl)
            ->setAccounts($data->accounts
            );

        $mock = new MockHandler([new Response(200, [], json_encode($data))]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $monobank = new MonobankAPI($client, 'test');

        $response = $monobank->call(new ClientInfoRequest());
        $this->assertEquals(ClientInfoResponse::class, get_class($response));
        $this->assertEquals($clientResponse, $response);
    }
}
