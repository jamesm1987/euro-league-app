<?php

namespace App\Listeners;

use App\Events\FixtureFinalized;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Point;
use App\Models\Fixture;

class ProcessFixturePoints
{
    /**
     * Create the event listener.
     */
    public function __construct(
        public Point $point
    ){}

    /**
     * Handle the event.
     */
    public function handle(FixtureFinalized $event): void
    {
        $fixture = $event->fixture;
    }
}
