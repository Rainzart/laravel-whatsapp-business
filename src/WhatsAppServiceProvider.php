<?php

namespace Hadder\WhatsAppBusiness;

use Illuminate\Support\ServiceProvider;

class WhatsAppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/whatsapp.php', 'whatsapp'
        );

        $this->app->singleton('whatsapp', function ($app) {
            return new WhatsAppClient(
                $app['config']['whatsapp.token'],
                $app['config']['whatsapp.phone_number_id'],
                $app['config']['whatsapp.version']
            );
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/whatsapp.php' => config_path('whatsapp.php'),
            ], 'config');
        }
    }
}
