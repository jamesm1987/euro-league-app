<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\FixtureFinalized;
use App\Events\ApiImport;
use App\Jobs\ProcessFixturePointsListener;
use App\Listeners\SaveApiResponse;

class EventServiceProvider extends ServiceProvider
{


    protected $listen = [
        FixtureFinalized::class => [
            ProcessFixturePointsListener::class,
        ],

        ApiImport::class => [
            SaveApiResponse::class,
        ],
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
