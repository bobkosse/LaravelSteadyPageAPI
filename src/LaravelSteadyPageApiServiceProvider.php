<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi;

use BobKosse\LaravelSteadyPageApi\Console\Commands\LaravelSteadyPageApiCommand;
use BobKosse\LaravelSteadyPageApi\Endpoints\SteadyClient;
use Illuminate\Support\ServiceProvider;

class LaravelSteadyPageApiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-steady-page-api.php', 'laravel-steady-page-api');
        $this->mergeConfigFrom(__DIR__.'/../config/data.php', 'data');


        $this->app->singleton(SteadyClient::class, function ($app) {
            return new SteadyClient(
                steadyUrl: config('laravel-steady-page-api.STEADY_URL'),
                steadyKey: config('laravel-steady-page-api.STEADY_KEY'),
            );
        });

        $this->app->singleton('laravel-steady-page-api', function ($app) {
            return new SteadyPageApi;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/laravel-steady-page-api.php' => config_path('laravel-steady-page-api.php'),
        ], ['laravel-steady-page-api', 'laravel-steady-page-api-config']);

        $this->commands([
            LaravelSteadyPageApiCommand::class,
        ]);
    }
}
