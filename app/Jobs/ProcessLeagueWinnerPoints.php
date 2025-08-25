<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Collection;

use App\Points\Services\PointsProcessor;


class ProcessLeagueWinnerPoints implements ShouldQueue
{
    use Queueable;


    protected $leagues;

    /**
     * Create a new job instance.
     */
    public function __construct(Collection $leagues)
    {
        $this->leagues = $leagues;
    }

    /**
     * Execute the job.
     */
    public function handle(PointsProcessor $processor): void
    {
        foreach ($this->leagues as $league) {
            $processor->evaluateLeagueWinners($league);
        }
    }
}

