<?php

declare(strict_types=1);

namespace BobKosse\LaravelSteadyPageApi\Casts;

use DateTime;
use DateTimeImmutable;
use InvalidArgumentException;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class DateTimeCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): DateTimeImmutable
    {
        if ($value instanceof DateTimeImmutable) {
            return $value;
        }

        // Use DateTime::createFromFormat for specific format handling instead of new DateTimeImmutable()
        $formats = [
            'Y-m-d\TH:i:s.uP',  // 2018-08-16T09:15:29.803825Z
            'Y-m-d\TH:i:sP',    // 2018-08-16T09:15:29+00:00
            DateTime::RFC3339,  // Standard RFC 3339 format
        ];

        foreach ($formats as $format) {
            $date = DateTime::createFromFormat($format, $value);

            if ($date !== false) {
                return DateTimeImmutable::createFromMutable($date);
            }
        }

        throw new InvalidArgumentException('Unable to parse date: '.$value);
    }
}
