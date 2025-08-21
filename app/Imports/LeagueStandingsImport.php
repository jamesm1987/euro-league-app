<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;
use App\Models\GameRule;
use App\Models\Point;
use Illuminate\Support\Facades\Log;
use App\Services\ApiHelper;

class LeagueStandingsImport implements ImportTypeInterface
{

    protected $apiService;
    protected $apiHelper;

    public function __construct(FootballDataApiClient $footballDataApiClient, ApiHelper $apiHelper)
    {
        $this->apiService = $footballDataApiClient;
        $this->apiHelper = $apiHelper;
    }

    public function fetch()
    {

        $leagues = Competition::where('type', 'league')
            ->get(['id', 'api_id']);


        return $this->apiService->getLeagueStandings($leagues);
        
    }

    public function process($data): void
    {

        foreach ($data as $league) {

            $competition_id = $this->apiHelper->getLeagueIdByApiId($league['league_id']);

            $gameRule = GameRule::where('key', 'league_win')->first();


            Point::updateOrCreate(
                ['pointable_id' => $competition_id],
                [
                    'team_id' => $this->apiHelper->getTeamIdByApiId($league['winner_id']),
                    'pointable_type' => Competition::class,
                    'game_rule_id' => $gameRule->id
                ]
            );

        }

    }

    public function transform(array $data): array
    {

        $leagues = [];

        foreach ($data as $row) {
            $league = $row['league'];
            $standings = $league['standings'][0];

            $leagues[] = [
                'standings' => $standings,
                'winner_id' => $standings[0]['team']['id'],
                'league_id'  => $league['id'],
            ];
        }

       return $leagues;
    }

}
