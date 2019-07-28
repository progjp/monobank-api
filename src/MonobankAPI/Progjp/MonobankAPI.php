<?php

namespace MonobankAPI\Progjp;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use MonobankAPI\Progjp\Client\Request\MonoBankRequest;
use MonobankAPI\Progjp\Exception\InternalErrorException;
use MonobankAPI\Progjp\Exception\InvalidAccountException;
use MonobankAPI\Progjp\Exception\InvalidTokenException;
use MonobankAPI\Progjp\Exception\MissingRequiredFieldException;
use MonobankAPI\Progjp\Exception\PeriodMustBeNoMoreException;
use MonobankAPI\Progjp\Exception\TooManyRequestsException;
use MonobankAPI\Progjp\Exception\ValueMustBeGreaterException;
use Psr\Http\Message\ResponseInterface;

class MonobankAPI
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    const API_URL = 'https://api.monobank.ua/';

    public function __construct(Client $client, ?string $token = null)
    {
        $this->token = $token;
        $this->client = $client;
    }

    public function call(MonoBankRequest $monoBankRequest)
    {
        return $this->request($monoBankRequest);
    }


    protected function request(MonoBankRequest $request)
    {
        $body = $request->getBody();
        try {
            $response = $this->client->request($request->getType(),
                self::API_URL . $request->getEndpointURL(),
                [
                    'headers' => $this->prepareHeaders($body),
                    'body' => $body
                ]
            );

            return $request->getResponse($response);
        } catch (ClientException  $e) {
            $this->throwError($e);
        }

        return '';
    }

    /**
     * @param ClientException $e
     * @throws InternalErrorException
     * @throws InvalidAccountException
     * @throws InvalidTokenException
     * @throws MissingRequiredFieldException
     * @throws PeriodMustBeNoMoreException
     * @throws TooManyRequestsException
     * @throws ValueMustBeGreaterException
     */
    protected function throwError(ClientException $e)
    {
        $error = $this->decodeResponse($e->getResponse());
        if ($error['errorDescription'] == "Unknown 'X-Token'") {
            throw new InvalidTokenException($e->getResponse()->getBody()->getContents());
        }
        if ($error['errorDescription'] == 'Too many requests') {
            throw new TooManyRequestsException($e->getResponse()->getBody());
        }
        if ($error['errorDescription'] == 'invalid account') {
            throw new InvalidAccountException($e->getResponse()->getBody()->getContents());
        }
        if ($error['errorDescription'] == 'internal error') {
            throw new InternalErrorException($e->getResponse()->getBody()->getContents());
        }
        if (strpos($error['errorDescription'], 'Missing required field') !== false) {
            throw new MissingRequiredFieldException($e->getResponse()->getBody()->getContents());
        }
        if (strpos($error['errorDescription'], 'out of bounds') !== false) {
            throw new PeriodMustBeNoMoreException($e->getResponse()->getBody()->getContents());
        }
        if (strpos($error['errorDescription'], 'must be greater') !== false) {
            throw new ValueMustBeGreaterException($e->getResponse()->getBody()->getContents());
        }

        throw new \Exception($e->getResponse()->getBody()->getContents(), $e->getResponse()->getStatusCode());
    }

    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    protected function decodeResponse(ResponseInterface $response)
    {
        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }

    private function prepareHeaders(string $body)
    {
        $headers = [];
        if ($this->token) {
            $headers['X-Token'] = $this->token;
        }
        if (!empty($body)) {
            $headers['Content-Type'] = 'application/json';
        }

        return $headers;
    }
}