<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi\Console\Commands;

use Illuminate\Console\Command;

class LaravelSteadyPageApiCommand extends Command
{
    /**
     * The command signature.
     */
    protected $signature = 'laravel-steady-page-api:placeholder';

    /**
     * The command description.
     */
    protected $description = 'Placeholder Artisan command shipped by the package laravel-steady-page-api.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->line('LaravelSteadyPageApi placeholder command executed.');

        return self::SUCCESS;
    }
}
