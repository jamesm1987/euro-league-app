<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\FixtureFinalized;
use App\Jobs\ProcessFixturePoints;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(FixtureFinalized::class, function (FixtureFinalized $event) {
            ProcessFixturePoints::dispatch($event->fixture)->onQueue('points');
        });
    }
}
