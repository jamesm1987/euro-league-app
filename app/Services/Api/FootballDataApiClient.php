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
            Log::error("API call exception for {$url}: " . $e->getMessage());
            return null;
        }
         
    }

    
    public function getTeams($leagues): array
    {
        $teams = [];
        foreach ($leagues as $league) {
            $apiResponse = $this->call('teams', [
                'season' => $this->season,
                'league' => $league->api_id
            ]);

            $teams[] = $apiResponse['response'] ?? [];
        }

        return $teams;
    }

    public function getFixtures($leagues): array
    {
        $fixtures = [];
        foreach ($leagues as $league) {
            $apiResponse = $this->call('fixtures', [
                'season' => $this->season,
                'league' => $league->api_id,
            ]);

            $fixtures[] = $apiResponse['response'] ?? [];
        }
        return $fixtures;
    }

    public function getCupWinners($cups): array
    {
        $winners = [];
        foreach ($cups as $cup) {
            $apiResponse = $this->call('fixtures', [
                'season' => $this->season,
                'league' => $cup->api_id,
                'round'  => 'final'
            ]);

            $winners[] = $apiResponse['response'] ?? [];
        }
        return $winners;
    }

    public function getLeagueStandings($leagues): array
    {
        $standings = [];
        foreach ($leagues as $league) {
            $apiResponse = $this->call('standings', [
                'season' => $this->season,
                'league' => $league->api_id,
            ]);

            $standings[] = $apiResponse['response'] ?? [];
        }
        return $standings;
    }

    public function getTopGoalscorers($leagues): array
    {
        $scorers = [];
        foreach ($leagues as $league) {
            $apiResponse = $this->call('players/topscorers', [
                'season' => $this->season,
                'league' => $league->api_id,
            ]);

            $scorers[] = $apiResponse['response'] ?? [];
        }
        return $scorers;
    }
}