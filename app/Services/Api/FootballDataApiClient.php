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

            Log::info("API TEST RESPONSE", print_r($response));

            if ($response->failed()) {
                logger()->error("API call failed for {$url}", ['response' => $response->body()]);
                return null;
            }

            return $response;

        } catch (Exception $e) {
            return '';
        }
         
    }

    public function getTeams($leagues = []){

        foreach ($leagues as $api_id) {
            
            $teams = $this->call('teams', [
                    'season' => $this->season,
                    'league_id' => $api_id
                ]);

            return $teams;
        }
    }

    public function getFixtures(){}

}