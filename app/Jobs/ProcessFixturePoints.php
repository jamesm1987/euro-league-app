<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Points\Services\PointsProcessor;

use App\Models\Fixture;

class ProcessFixturePoints implements ShouldQueue
{
    use Queueable;

    protected Fixture $fixture;


    /**
     * Create a new job instance.
     */
    public function __construct(Fixture $fixture)
    {
        $this->fixture = $fixture;
    }

    /**
     * Execute the job.
     */
    public function handle(PointsProcessor $processor): void
    {
        $processor->evaluateFixture($this->fixture);
    }
}
