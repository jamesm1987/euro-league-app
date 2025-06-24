<?php

namespace App\Services\Api;

class FootballDataApiClient 
{
    public $apiKey;
    public $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('football-data-api.app.key');

        $this->baseUrl = config('football-data-api.app.baseUrl');
    }

    public function fetchTeams()
    {

    }
}