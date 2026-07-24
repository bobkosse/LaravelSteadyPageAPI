<?php

namespace BobKosse\LaravelSteadyPageApi\DTO;

use BobKosse\LaravelSteadyPageApi\Casts\DateTimeCast;
use DateTimeImmutable;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\ActiveUrl;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class PublicationAttributesDTO extends Data
{
    public function __construct(
        #[Max(100)]
        public string $title,

        #[ActiveUrl]
        #[MapName('campaign-page-url')]
        public string $campaignPageUrl,

        #[MapName('members-count')]
        public int $membersCount,

        #[MapName('paying-members-count')]
        public int $payingMembersCount,

        #[MapName('trial-members-count')]
        public int $trialMembersCount,

        #[MapName('guest-members-count')]
        public int $guestMembersCount,

        #[MapName('monthly-amount')]
        public int $monthlyAmount,

        #[MapName('editor-name')]
        public string $editorName,

        #[MapName('trial-period-activated')]
        public string $trialPeriodActivated,
        public bool $public,

        #[ActiveUrl]
        #[MapName('js-widget-url')]
        public string $jsWidgetUrl,

        #[WithCast(DateTimeCast::class)]
        #[MapName('inserted-at')]
        public DateTimeImmutable $insertedAt,

        #[WithCast(DateTimeCast::class)]
        #[MapName('updated-at')]
        public DateTimeImmutable $updatedAt,
    ) {}
}
