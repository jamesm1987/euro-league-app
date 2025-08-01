<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Exception;
use Illuminate\Support\Facades\Log;

class FootballDataApiClient 
{
    public $host;
    public $apiKey;
    public $baseUrl;
    public $season;

    public function __construct()
    {
        $this->apiKey = config('football-data-api.app.key');

        $this->baseUrl = config('football-data-api.app.base_url');

        $this->host = config('football-data-api.app.host');

        $this->season = config('football-data-api.app.season');
    }

    protected function call(string $endpoint, array $params = []): mixed
    {

        $url = "{$this->baseUrl}{$endpoint}";

        try {

            $response = Http::withHeaders([
                'x-rapidapi-host' => $this->host,
                'x-rapidapi-key' => $this->apiKey,
            ])->get($url, $params);


            if ($response->failed()) {
                logger()->error("API call failed for {$url}", ['response' => $response->body()]);
                return null;
            }
        

            return $response->json();

        } catch (Exception $e) {
            return '';
        }
         
    }

    
public function getTeams($leagues)
{
    $teams = [];

    foreach ($leagues as $league) {
        $apiResponse = $this->call('teams', [
            'season' => $this->season,
            'league' => $league->api_id
        ]);


        if (isset($apiResponse['response']) && is_array($apiResponse['response'])) {
            foreach ($apiResponse['response'] as $team) {
                $team['league_id'] = $league->id;
                $teams[] = $team;
            }
        }
    }

    return $teams;
}

public function getFixtures($leagues)
{
    $fixtures = collect($leagues)
        ->flatMap(function ($league) {
            $apiResponse = $this->call('fixtures', [
                'season' => $this->season,
                'league' => $league->api_id,
            ]);

            return $apiResponse['response'] ?? [];
        })
        ->values()
        ->all();

        return $fixtures;
    }

}