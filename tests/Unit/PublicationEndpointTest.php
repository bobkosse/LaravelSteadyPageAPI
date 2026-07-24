<?php

declare(strict_types=1);

use BobKosse\LaravelSteadyPageApi\Facades\Steady;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

it('can get data from the publications endpoint', closure: function () {
    Http::fake([
        config('STEADY_URL') => Http::response([
            'data' => [
                'type' => 'publication',
                'id' => '0879c0a7-cc51-44fc-ac35-4bec65735d5b',
                'attributes' => [
                    'title' => 'Title of your publication',
                    'campaign-page-url' => 'https://steadyhq.com/your-publication',
                    'members-count' => 10,
                    'paying-members-count' => 7,
                    'trial-members-count' => 2,
                    'guest-members-count' => 1,
                    'monthly-amount' => 14223,
                    'monthly-amount-in-cents' => 14223,
                    'editor-name' => 'Foo Bear',
                    'trial-period-activated' => true,
                    'public' => true,
                    'js-widget-url' => 'https://steadyhq.com/widget_loader/0879c0a7-cc51-44fc-ac35-4bec65735d5b',
                    'inserted-at' => '2018-08-16T09:15:29.803825Z',
                    'updated-at' => '2018-08-16T09:15:29.803830Z',
                ],
            ],
        ], 200),
    ]);

    try {
        $result = Steady::publication();
    } catch (ConnectionException|RequestException $e) {
        exit($e->getMessage());
    }

    expect($result->type)->toBe('publication')
        ->and($result->attributes->public)->toBeTrue();

    Http::assertSent(function ($request) {
        return str_ends_with($request->url(), '/api/v1/publication')
            && $request->method() === 'GET';
    });
});
