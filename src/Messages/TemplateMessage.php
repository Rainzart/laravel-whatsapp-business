<?php

namespace Hadder\WhatsAppBusiness\Messages;

class TemplateMessage implements Message
{
    protected $to;
    protected $templateName;
    protected $components;
    protected $language;

    public function __construct(string $to, string $templateName, array $components = [], string $language = 'pt_BR')
    {
        $this->to = $to;
        $this->templateName = $templateName;
        $this->components = $components;
        $this->language = $language;
    }

    public function toArray(): array
    {
        $payload = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $this->to,
            'type' => 'template',
            'template' => [
                'name' => $this->templateName,
                'language' => [
                    'code' => $this->language
                ]
            ]
        ];

        if (!empty($this->components)) {
            $payload['template']['components'] = $this->components;
        }

        return $payload;
    }
}
