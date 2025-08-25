<?php

namespace App\Services;

use App\Models\Team;
use App\Models\Competition;

class ApiHelper
{
    protected $teamsByApiId;
    protected $leagueByApiId;

    public function __construct()
    {
        $this->teamsByApiId = Team::all()->keyBy('api_id');
        $this->leaguesByApiId = Competition::where('type', 'league')->get()->keyBy('api_id');
        $this->cupsByApiId = Competition::where('type', 'cup')->get()->keyBy('api_id');
    }

    public function getTeamIdByApiId($apiId)
    {
        return $this->teamsByApiId[$apiId]->id ?? null;
    }

    public function getLeagueIdByApiId($apiId)
    {
        return $this->leaguesByApiId[$apiId]->id ?? null;
    }

    public function getCupIdByApiId($apiId)
    {
        return $this->cupsByApiId[$apiId]->id ?? null;
    }    
}
