<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;

class TeamsImport implements ImportTypeInterface
{

    protected $apiService;

    public function __construct(FootballDataApiClient $footballDataApiClient)
    {
        $this->apiService = $footballDataApiClient;
    }

    public function fetch()
    {

        $leagues = Competition::where('type', 'league')->pluck('api_id');

        return $this->apiService->getTeams($leagues);
    }

    public function process($data): void
    {
        // Process and save teams data to DB, dispatch events, etc.
        foreach ($data as $team) {
            // Your Eloquent save logic, e.g.
            // Team::updateOrCreate(['name' => $team['name']], $team);
        }
    }

    public function transform($data): void
    {
        // Process and save teams data to DB, dispatch events, etc.
        foreach ($data as $team) {
            // Your Eloquent save logic, e.g.
            // Team::updateOrCreate(['name' => $team['name']], $team);
        }
    }    
}