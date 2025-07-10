<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Token de acesso à API do WhatsApp Business
    |--------------------------------------------------------------------------
    |
    | Token de acesso permanente gerado no Facebook Developer Portal
    |
    */
    'token' => env('WHATSAPP_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | ID do número de telefone
    |--------------------------------------------------------------------------
    |
    | ID do número de telefone registrado no WhatsApp Business API
    |
    */
    'phone_number_id' => env('WHATSAPP_PHONE_NUMBER_ID'),

    /*
    |--------------------------------------------------------------------------
    | Versão da API
    |--------------------------------------------------------------------------
    |
    | Versão da API Graph do Facebook para WhatsApp Business
    |
    */
    'version' => env('WHATSAPP_API_VERSION', '22.0'),
];
