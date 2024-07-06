<?php

namespace Braunson\FatSecret;

use Illuminate\Support\ServiceProvider;

class FatSecretServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(FatSecret::class, function ($app) {
            $config = $app['config']->get('fatsecret');
            return new FatSecret($config['consumer_key'], $config['consumer_secret'], $config['api_url']);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/fatsecret.php' => config_path('fatsecret.php'),
        ]);
    }
}
