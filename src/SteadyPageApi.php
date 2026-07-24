<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi;

use BobKosse\LaravelSteadyPageApi\DTO\PublicationDTO;
use BobKosse\LaravelSteadyPageApi\Endpoints\PublicationEndpoint;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class SteadyPageApi
{
    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function publication(): PublicationDTO
    {
        return app(PublicationEndpoint::class)();
    }
}
