<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ApiLookup;

class SaveApiResponse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $endpoint;
    public $response;
    /**
     * Create a new job instance.
     */
    public function __construct(string $endpoint, array $response)
    {
        $this->endpoint = $endpoint;
        $this->response = $response;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        ApiLookup::create([
            'endpoint' => $this->endpoint,
            'response'  => json_encode($this->response),
            'lookup_at' => now(),
        ]);
    }
}



