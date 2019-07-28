<?php

namespace MonobankAPI\Progjp\Client\Request;

use Psr\Http\Message\ResponseInterface;

interface MonoBankRequest
{
    public function buildRequestUri(): string;
    public function getEndpointURL(): string;
    public function getBody(): string;
    public function getType(): string;
    public function getResponse(ResponseInterface $response);
}