<?php

namespace MonobankAPI\Progjp\Client\Request;

abstract class AbstractRequest implements MonoBankRequest
{
    /** @var string  */
    private $type = 'GET';

    /** @var string */
    private $endpointURL;

    public function getBody(): string
    {
        return '';
    }

    public function buildRequestUri(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function getEndpointURL(): string
    {
        return $this->endpointURL;
    }

    /**
     * @return string
     */
    public function setEndpointURL(string $url): string
    {
        $this->endpointURL = $url;

        return $this->endpointURL;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
