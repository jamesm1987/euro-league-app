<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

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


    public static function getUnprocessedFixtures(): Collection
    {   
        return static::where('is_processed', false)
            ->whereNotNull('home_team_score')
            ->whereNotNull('away_team_score');
    }

    public function resultOutcome()
    {
        if (is_null($this->home_team_score) || is_null($this->away_team_score)) {
            return null;
        }

        if ($this->home_team_score > $this->away_team_score) {
            return 'home';
        }

        if ($this->home_team_score < $this->away_team_score) {
            return 'away';
        }

        return 'draw';
    }

    public function teamResultOutcome(int $teamId): ?int
    {
        $fixtureResultOutcome = $this->resultOutcome();

        if ($this->home_team_id === $teamId) {
            return match ($fixtureResultOutcome) {
                'home' => 'win',
                'away' => 'loss',
                'draw'  => 'draw',
            };
        }

        if ($this->away_team_id === $teamId) {
            return match ($absolute) {
                'home' => 'loss',
                'away' => 'win',
                'draw'    => 'draw',
            };
        }

        return null;
    }

}