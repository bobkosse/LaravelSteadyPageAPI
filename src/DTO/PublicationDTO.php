<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi\DTO;

use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;

class PublicationDTO extends Data
{
    public function __construct(
        public string $id,

        #[In(['publication'])]
        public string $type,

        public PublicationAttributesDTO $attributes,
    ) {}
}
