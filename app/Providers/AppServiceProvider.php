<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\ExchangeAPI;
use App\Services\BinanceAPI;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(ExchangeAPI::class, function ($app) {
        //     return new BinanceAPI();
        // });

        // Реализация интерфейса
        $this->app->bind(ExchangeAPI::class, BinanceAPI::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
