<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;
use App\Models\Team;

class TeamsImport implements ImportTypeInterface
{

    protected $apiService;

    public function __construct(FootballDataApiClient $footballDataApiClient)
    {
        $this->apiService = $footballDataApiClient;
    }

    public function fetch()
    {

        $leagues = Competition::where('type', 'league')
            ->get(['id', 'api_id']);

        return $this->apiService->getTeams($leagues);
    }

    public function process($data): void
    {
        foreach ($data as $team) {
            Team::updateOrCreate(
                ['api_id' => $team['api_id']],
                [
                    'name' => $team['name'],
                ]
            );
        }
    }

    public function transform($data)
    {
        return collect($data['response'] ?? [])->map(function ($entry) {
        
            $team = $entry['team'] ?? [];

        return [
            'api_id' => $team['id'],
                'name' => $team['name'],
            ];
        })->toArray();
    }
}
