<?php

declare(strict_types=1);

use BobKosse\LaravelSteadyPageApi\LaravelSteadyPageApi;

it('resolves the singleton', function () {
    expect(app(LaravelSteadyPageApi::class))->toBeInstanceOf(LaravelSteadyPageApi::class);
});

it('returns the same instance from the container', function () {
    expect(app(LaravelSteadyPageApi::class))->toBe(app(LaravelSteadyPageApi::class));
});

it('merges the package config', function () {
    expect(config('laravel-steady-page-api.placeholder'))->toBe('default');
});

it('registers the artisan command', function () {
    $this->artisan('laravel-steady-page-api:placeholder')
        ->expectsOutputToContain('LaravelSteadyPageApi placeholder command executed.')
        ->assertSuccessful();
});
