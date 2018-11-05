<?php
namespace Grambas\SmsGateway;

use Illuminate\Support\ServiceProvider;
use App;
use GuzzleHttp\Client;

class SmsGatewayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SmsGateway', function()
        {
            return new SmsGateway($token, $token_secret);
        });
    }
}
