<?php

namespace MonobankAPI\Progjp\Client\Request;

use MonobankAPI\Progjp\Response\ClientInfoResponse;
use Psr\Http\Message\ResponseInterface;

class ClientInfoRequest extends AbstractRequest implements MonoBankRequest
{
    /** @var string  */
    const URL = 'personal/client-info';

    /**
     * @return string
     */
    public function getEndpointURL(): string
    {
        return self::URL;
    }

    public function getResponse(ResponseInterface $response): ClientInfoResponse
    {

        $response = json_decode($response->getBody()->getContents(), true);
        /** @var array $response */
        return (new ClientInfoResponse())
            ->setName($response['name'])
            ->setWebHookUrl($response['webHookUrl'] ?? null)
            ->setAccounts($response['accounts']);
    }

    public function getBody(): string
    {
        return '';
    }

    public function buildRequestUri(): string
    {
        return '';
    }
}