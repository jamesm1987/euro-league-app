<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Fixture;

class FixtureFinalized
{
    use Dispatchable, SerializesModels;

    public Fixture $fixture;

    /**
     * Create a new event instance.
     */
    public function __construct(Fixture $fixture)
    {
        $this->fixture = $fixture;
    }
}
