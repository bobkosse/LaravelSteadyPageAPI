<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi\Tests;

use BobKosse\LaravelSteadyPageApi\LaravelSteadyPageApiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelSteadyPageApiServiceProvider::class,
        ];
    }
}
