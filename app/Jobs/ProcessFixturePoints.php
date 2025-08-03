<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Fixture;
use App\Services\GameRules\ResultPointsEvaluator;

class ProcessFixturePoints implements ShouldQueue
{
    use Queueable;

    public Fixture $fixture;

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
    public function handle(ResultPointsEvaluator $evaluator): void
    {
        //
    }
}
