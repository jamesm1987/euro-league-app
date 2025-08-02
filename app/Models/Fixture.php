<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $fillable = [
        'api_id',
        'league_id',
        'home_team_id',
        'away_team_id',
        'home_team_score',
        'away_team_score',
        'kickoff_at',
        'status',
        'is_processed',
    ];

    protected $casts = [
        'kickoff_at' => 'datetime',
        'is_processed' => 'boolean',
    ];

        protected function formattedScore(): Attribute

    {

        return Attribute::make(

            get: fn () => "{$this->home_team_score} - {$this->away_team_score}",

        );

    }

    public function home_team()
    {
        return $this->belongsTo(Team::class, 'home_team_id', 'id');
    }

    public function away_team()
    {
        return $this->belongsTo(Team::class, 'away_team_id', 'id');
    }

    public function league()
    {
        return $this->belongsTo(Competition::class);
    }



}
