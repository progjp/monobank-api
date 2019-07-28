<?php

namespace MonobankAPI\Progjp\Client\Request;

use Psr\Http\Message\ResponseInterface;

class WebHookRequest extends AbstractRequest implements MonoBankRequest
{
    /** @var string  */
    const URL = 'personal/webhook';

    /** @var string  */
    public $type = 'POST';

    /** @var string */
    private $webhookUrl;

    public function __construct(string $webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
        $this->setEndpointURL(self::URL);
    }

    public function getResponse(ResponseInterface $response): string
    {
        return '';
    }

    public function getBody(): string
    {
        return json_encode(['webHookUrl' => $this->webhookUrl]);
    }

    public function getType(): string
    {
        return $this->type;
    }
}