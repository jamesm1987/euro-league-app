<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Imports\ImportTypeInterface;

class ImportJob implements ShouldQueue
{
    use Queueable;

    protected ImportTypeInterface $importer;


    /**
     * Create a new job instance.
     */
    public function __construct(ImportTypeInterface $importer)
    {
        $this->importer = $importer;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = $this->importer->fetch();

        $data = $this->importer->transform($response);
        $this->importer->process($data);

    }
}
