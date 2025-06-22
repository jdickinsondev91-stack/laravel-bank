<?php

namespace App\Providers;

use App\Contracts\ExchangeRateProvider;
use App\External\ExchangeRates\ExchangeRateApiClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //TODO - bind a fallback implementation
        $this->app->bind(ExchangeRateProvider::class, ExchangeRateApiClient::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
