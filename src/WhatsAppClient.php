<?php

namespace Hadder\WhatsAppBusiness;

use GuzzleHttp\Client;
use Hadder\WhatsAppBusiness\Exceptions\WhatsAppException;
use Hadder\WhatsAppBusiness\Messages\Message;
use Hadder\WhatsAppBusiness\Messages\TemplateMessage;
use Hadder\WhatsAppBusiness\Messages\TextMessage;

class WhatsAppClient
{
    protected $client;
    protected $token;
    protected $phoneNumberId;
    protected $version;
    protected $baseUrl = 'https://graph.facebook.com';

    public function __construct(string $token, string $phoneNumberId, string $version = 'v19.0')
    {
        $this->token = $token;
        $this->phoneNumberId = $phoneNumberId;
        $this->version = $version;
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function sendTemplate(string $to, string $templateName, array $components = [], string $language = 'pt_BR')
    {
        $message = new TemplateMessage($to, $templateName, $components, $language);
        return $this->sendMessage($message);
    }

    public function sendText(string $to, string $text)
    {
        $message = new TextMessage($to, $text);
        return $this->sendMessage($message);
    }

    public function sendMessage(Message $message)
    {
        try {
            $response = $this->client->post("/{$this->version}/{$this->phoneNumberId}/messages", [
                'json' => $message->toArray(),
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new WhatsAppException(
                "Erro ao enviar mensagem: " . $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
    }
}
