<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;
use App\Models\Fixture;
use Illuminate\Support\Facades\Log;
use App\Services\ApiHelper;
use App\Events\FixtureFinalized;

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

        return $this->apiService->getFixtures($leagues);
    }

    public function process($data): void
    {

        foreach ($data as $fixture) {


            $fixture = Fixture::updateOrCreate(
                ['api_id' => $fixture['api_id']],
                [
                    'home_team_id' => $this->apiHelper->getTeamIdByApiId($fixture['home_team_id']),
                    'away_team_id' => $this->apiHelper->getTeamIdByApiId($fixture['away_team_id']),
                    'home_team_score' => $fixture['home_team_score'],
                    'away_team_score' => $fixture['away_team_score'],
                    'league_id' => $this->apiHelper->getLeagueIdByApiId($fixture['league_id']),
                    'kickoff_at' => $fixture['kickoff_at'],
                    'status' => $fixture['status']
                ]
            );

            if (
                !is_null($fixture->home_team_score) &&
                !is_null($fixture->away_team_score) &&
                !$fixture->is_processed
            ) {
                FixtureFinalized::dispatch($fixture)->onQueue('points');
            }
        }

    }

    public function transform(array $data): array
    {
       $fixtures = [];
       
       foreach ($data as $row) {
            $fixture = $row['fixture'];
            $league = $row['league'];
            $teams = $row['teams'];
            $score =  $row['score'];

            if ($league['round'] === 'Relegation Round') {
                continue;
            }

            $fixtures[] = [
                'api_id' => $fixture['id'],
                'home_team_id' => $teams['home']['id'],
                'away_team_id' => $teams['away']['id'],
                'home_team_score' => $score['fulltime']['home'],
                'away_team_score' => $score['fulltime']['away'],
                'kickoff_at' => $fixture['date'],
                'league_id'  => $league['id'],
                'status' => $fixture['status']['long']
            ];

       }

       return $fixtures;
    }

}
