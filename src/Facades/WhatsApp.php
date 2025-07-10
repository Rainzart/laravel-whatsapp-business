<?php

namespace Hadder\WhatsAppBusiness\Facades;

use Illuminate\Support\Facades\Facade;

class WhatsApp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'whatsapp';
    }
}
