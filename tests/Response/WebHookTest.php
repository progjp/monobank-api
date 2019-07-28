<?php

declare(strict_types=1);

namespace Tests\MonobankAPI;

use GuzzleHttp\Client;
use MonobankAPI\Progjp\MonobankAPI;
use MonobankAPI\Progjp\Client\Request\WebHookRequest;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class WebHookTest extends TestCase
{
    public function testCreatingFromResponse()
    {
        $webHookUrl = 'https://test.com';

        $mock = new MockHandler([new Response(200)]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        $monobank = new MonobankAPI($client, 'test');

        $response = $monobank->call(new WebHookRequest($webHookUrl));

        $this->assertEquals('', $response);
    }
}
