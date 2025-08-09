<?php

namespace App\Listeners;

use App\Events\FixtureFinalized;
use App\Jobs\ProcessFixturePoints;

class ProcessFixturePointsListener
{
    /**
     * Handle the event.
     */
    public function handle(FixtureFinalized $event): void
    {
        ProcessFixturePoints::dispatch($event->fixture)->onQueue('points');
    }
}