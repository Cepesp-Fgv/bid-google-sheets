<?php

namespace App\Providers;

use App\Http\Middleware\GoogleOAuth2Middleware;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Google_Client::class, function () {
            $accessToken = GoogleOAuth2Middleware::token();

            $client = new \Google_Client();
            $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
            $client->setAccessToken($accessToken->getToken());

            return $client;
        });

        $this->app->bind(\Google_Service_Sheets::class, function ($app) {
            $client = $app->make(\Google_Client::class);
            return new \Google_Service_Sheets($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('FORCE_HTTPS',false))
            URL::forceScheme('https');
    }
}
