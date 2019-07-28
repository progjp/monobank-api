<?php

declare(strict_types=1);

namespace Tests\MonobankAPI;

use GuzzleHttp\Client;
use MonobankAPI\Progjp\Client\Request\StatementRequest;
use MonobankAPI\Progjp\DTO\StatementDTO;
use MonobankAPI\Progjp\Response\StatementResponse;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use MonobankAPI\Progjp\MonobankAPI;

class StatementTest extends TestCase
{
    public function testCreatingFromResponse()
    {
        $data = [
            [
                'id' => 'dsfdsf',
                'time' => 1562061054,
                'description' => '000000***0000',
                'mcc' => 4829,
                'hold' => true,
                'amount' => 10200,
                'operationAmount' => -10200,
                'currencyCode' => 980,
                'commissionRate' => 0,
                'cashbackAmount' => 0,
                'balance' => 500000,
            ]
        ];
       $clientResponse = [(new StatementResponse())
            ->setId($data[0]['id'])
            ->setTime($data[0]['time'])
            ->setDescription($data[0]['description'])
            ->setMcc($data[0]['mcc'])
            ->setHold($data[0]['hold'])
            ->setAmount($data[0]['amount'])
            ->setOperationAmount($data[0]['operationAmount'])
            ->setCurrencyCode($data[0]['currencyCode'])
            ->setCommissionRate($data[0]['commissionRate'])
            ->setCashbackAmount($data[0]['cashbackAmount'])
            ->setBalance($data[0]['balance']
            )];

        $mock = new MockHandler([new Response(200, [], json_encode($data))]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        $monobank = new MonobankAPI($client, 'test');

        $response = $monobank->call(new StatementRequest((new StatementDTO())
            ->setAccount('test')
            ->setFrom((string)(new \DateTime('first day of this month'))->getTimestamp())
            ->setTo((string)(new \DateTime('last day of this month'))->getTimestamp())
        ));

        $this->assertEquals(StatementResponse::class, get_class($response[0]));
        $this->assertEquals($clientResponse, $response);
    }
}
