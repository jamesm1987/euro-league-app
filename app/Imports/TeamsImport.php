<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Services\Api\Response;
use App\Services\ApiHelper;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;
use App\Models\Team;

class TeamsImport implements ImportTypeInterface
{

    protected $apiService;
    protected $apiResponseService;
    protected $apiHelper;

    public function __construct(
        FootballDataApiClient $footballDataApiClient, 
        ApiHelper $apiHelper,
        Response $apiResponseService
    )
    {
        $this->apiService = $footballDataApiClient;
        $this->apiHelper = $apiHelper;
        $this->apiResponseService = $apiResponseService;
        
    }

    public function fetch(): array
    {

        $leagues = Competition::where('type', 'league')
            ->get(['id', 'api_id']);

        $response = $this->apiService->getTeams($leagues);

        $this->apiResponseService->store('teams', $response);


    }

    public function process($data): void
    {
        foreach ($data as $team) {
            Team::updateOrCreate(
                ['api_id' => $team['api_id']],
                [
                    'name' => $team['name'],
                    'league_id' => $team['league_id']
                ]
            );
        }
    }

    public function transform(array $data): array
    {
        return collect($data)->map(function ($entry) {
            $team = $entry['team'] ?? [];

            return [
                'api_id' => $team['id'] ?? null,
                'name' => $team['name'] ?? null,
                'league_id' => $team['league_id'],
            ];
        })->filter(function ($item) {
            return !is_null($item['api_id']) && !is_null($item['name']);
        })->toArray();

    }
}
