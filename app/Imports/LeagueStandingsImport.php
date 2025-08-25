<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Services\Api\Response;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;
use App\Models\GameRule;
use App\Models\Point;
use Illuminate\Support\Facades\Log;
use App\Services\ApiHelper;

class LeagueStandingsImport implements ImportTypeInterface
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

    public function fetch()
    {

        $leagues = Competition::where('type', 'league')
            ->get(['id', 'api_id']);


        $response = $this->apiService->getLeagueStandings($leagues);

        return $this->apiResponseService->store('leagueStandings', $response);
        
    }

    public function process($data): void
    {
        ProcessLeagueWinnerPoints::dispatch($data);
    }

    public function transform(array $record): array
    {

        $leagues = [];

        $competitions = json_decode($record->response, true);

        foreach ($competitions as $row) {
            $league = $row['league'];
            $standings = $league['standings'][0];

            $leagues[] = [
                'standings' => $standings,
                'winner_id' => $this->apiHelper->getTeamIdByApiId($standings[0]['team']['id']),
                'league_id'  => $this->apiHelper->getLeagueIdByApiId($league['id']),
            ];
        }

       return $leagues;
    }

}
