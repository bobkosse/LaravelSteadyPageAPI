<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BobKosse\LaravelSteadyPageApi\LaravelSteadyPageApi
 */
class LaravelSteadyPageApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BobKosse\LaravelSteadyPageApi\LaravelSteadyPageApi::class;
    }
}
