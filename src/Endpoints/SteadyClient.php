<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SteadyClient
{
    public function __construct(
        protected string $steadyUrl,
        protected string $steadyKey,
    ) {}

    public function client(): PendingRequest
    {
        return Http::baseUrl($this->steadyUrl)
            ->withToken($this->steadyKey)
            ->acceptJson();
    }
}
