<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi\Endpoints;

use BobKosse\LaravelSteadyPageApi\DTO\PublicationDTO;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class PublicationEndpoint
{
    public function __construct(
        protected SteadyClient $api,
    ) {}

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function __invoke(): PublicationDTO
    {
        $result = $this->api->client()
            ->get('/api/v1/publication')
            ->throw()
            ->json();

        return PublicationDTO::from($result['data']);
    }
}
