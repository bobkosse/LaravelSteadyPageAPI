<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi\Facades;

use Illuminate\Support\Facades\Facade;
use BobKosse\LaravelSteadyPageApi\SteadyPageApi;

/**
 * @method static array publication()
 *
 * @see SteadyPageApi
 */
class Steady extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        // Dit is de unieke sleutel in de Service Container
        return 'laravel-steady-page-api';
    }
}
