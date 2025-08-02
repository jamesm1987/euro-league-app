<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;
use App\Models\Fixture;
use Illuminate\Support\Facades\Log;
use App\Services\ApiHelper;

class FixturesImport implements ImportTypeInterface
{

    protected $apiService;
    protected $apiHelper;

    public function __construct(FootballDataApiClient $footballDataApiClient, ApiHelper $apiHelper)
    {
        $this->apiService = $footballDataApiClient;
        $this->apiHelper = $apiHelper;
    }

    public function fetch(): array
    {

        $leagues = Competition::where('type', 'league')
            ->get(['id', 'api_id']);


        $data = json_decode(file_get_contents(storage_path('app/fakes/fixtures.json')), true);

        return $data;
        // $fetch = $this->apiService->getFixtures($leagues);
    }

    public function process($data): void
    {

        foreach ($data as $fixture) {


            Fixture::updateOrCreate(
                ['api_id' => $fixture['api_id']],
                [
                    'home_team_id' => $this->apiHelper->getTeamIdByApiId($fixture['home_team_id']),
                    'away_team_id' => $this->apiHelper->getTeamIdByApiId($fixture['away_team_id']),
                    'league_id' => $this->apiHelper->getLeagueIdByApiId($fixture['league_id']),
                    'kickoff_at' => $fixture['kickoff_at'],
                    'status' => $fixture['status']
                ]
            );
        }
    }

    public function transform(array $data): array
    {
       $fixtures = [];

       Log::info($data);
       
       foreach ($data as $row) {
            $fixture = $row['fixture'];
            $league = $row['league'];
            $teams = $row['teams'];

            $fixtures[] = [
                'api_id' => $fixture['id'],
                'home_team_id' => $teams['home']['id'],
                'away_team_id' => $teams['away']['id'],
                'kickoff_at' => $fixture['date'],
                'league_id'  => $league['id'],
                'status' => $fixture['status']['long']
            ];
       }

       return $fixtures;
    }
}
