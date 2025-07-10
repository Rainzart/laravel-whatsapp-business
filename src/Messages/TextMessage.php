<?php

namespace Hadder\WhatsAppBusiness\Messages;

class TextMessage implements Message
{
    protected $to;
    protected $text;
    protected $previewUrl;

    public function __construct(string $to, string $text, bool $previewUrl = false)
    {
        $this->to = $to;
        $this->text = $text;
        $this->previewUrl = $previewUrl;
    }

    public function toArray(): array
    {
        return [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $this->to,
            'type' => 'text',
            'text' => [
                'preview_url' => $this->previewUrl,
                'body' => $this->text,
            ],
        ];
    }
}
