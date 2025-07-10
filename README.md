# Laravel WhatsApp Business API
Pacote para integração do Laravel 10+ com a API oficial do WhatsApp Business da Meta.

## !!! EM DESENVOLVIMENTO !!!
Este pacote foi desenvolvido para testes em sistemas Hadder Soft, use em **produção por sua conta e risco**!

## Instalação

1. Instale o pacote via Composer:

```bash
composer require hadder/laravel-whatsapp-business
```

2. Publique o arquivo de configuração:

```bash
php artisan vendor:publish --provider="Hadder\WhatsAppBusiness\WhatsAppServiceProvider"
```

3. Adicione as variáveis ao seu `.env`:

```
WHATSAPP_TOKEN=seu_token_aqui
WHATSAPP_PHONE_NUMBER_ID=seu_phone_number_id
WHATSAPP_API_VERSION=v22.0
```

## Uso Básico

### Envio de Mensagem de Texto (com links)

```php
use SeuVendor\WhatsAppBusiness\Facades\WhatsApp;

// Enviar mensagem de texto simples (com links)
WhatsApp::sendText('5511999999999', 'Olá! Acesse nosso site: https://www.exemplo.com');

// Com preview de URL habilitado
$message = new TextMessage('5511999999999', 'Acesse: https://www.exemplo.com', true);
WhatsApp::sendMessage($message);
```

### Envio de Template com Variáveis e Links

```php
use Hadder\WhatsAppBusiness\Facades\WhatsApp;

// Componentes com variáveis para substituição
$components = [
    [
        'type' => 'body',
        'parameters' => [
            [
                'type' => 'text',
                'text' => 'João Silva'
            ],
            [
                'type' => 'text',
                'text' => 'https://exemplo.com/perfil/123'
            ]
        ]
    ],
    [
        'type' => 'button',
        'sub_type' => 'url',
        'index' => 0,
        'parameters' => [
            [
                'type' => 'text',
                'text' => 'https://exemplo.com/perfil/123'
            ]
        ]
    ]
];

// Enviar template (deve estar previamente aprovado na plataforma da Meta)
WhatsApp::sendTemplate('5511999999999', 'nome_do_template', $components);
```

## Requisitos

- PHP 8.0+
- Laravel 10+
- Conta no WhatsApp Business API
- Token de acesso e Phone Number ID configurados na Meta

## Licença

MIT
