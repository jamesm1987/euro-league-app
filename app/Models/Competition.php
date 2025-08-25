<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use App\Utilities\GameRules;

class Competition extends Model
{
    protected $fillable = [
        'name',
        'type',
        'country',
        'team_id',
        'api_id',
    ];

    protected static function booted()
    {
        static::saving(function ($league) {
            $league->slug = Str::slug($league->name);
        });

    }

    public function scopeLeague($query)
    {
        return $query->where('type', 'league');
    }

    public function scopeCup($query)
    {
        return $query->where('type', 'cup');
    }    


    public function teams()
    {
        return $this->hasMany(Team::class, 'competition_id');
    }

    public function teamsOrderedByPoints()
    {
        return $this->teams->sortByDesc(fn($team) => $team->totalPoints())->values();
    }

    public function teamsOrderedByScorePoints()
    {
        return $this->teams->sortByDesc(fn($team) => $team->pointsForContext('score_points'))->values();
    }

    public function getLeagueTable()
    {
        return $this->teamsOrderedByPoints()->map(function ($team) {
            return [
                'id' => $team->id,
                'team' => $team->name,
                'won' => $team->winCount(),
                'drawn' => $team->drawCount(),
                'lost' => $team->defeatCount(),
                'points' => $team->pointsForContext('result_points'),
                'goal_difference' => $team->goalDifference(),
                'played' => $team->fixturesPlayed(),
            ];
        });
    }

    public function getScorePointsTable()
    {
        return $this->teamsOrderedByScorePoints()->map(function ($team) {
            return [
                'id' => $team->id,
                'team' => $team->name,
                'home_win' => $team->pointsCountForKey('home_win'),
                'away_win' => $team->pointsCountForKey('away_win'),
                'home_defeat' => $team->pointsCountForKey('home_defeat'),
                'away_defeat' => $team->pointsCountForKey('away_defeat'),
                'points' => $team->pointsForKey(['home_win', 'away_win', 'home_defeat', 'away_defeat']),
            ];
        });
    }    

    public function getTotalPointsTable()
    {

        return $this->teamsOrderedByPoints()->map(function ($team) {

            $gameRulesKeys = GameRules::getGameRuleKeys();
            return [
                'id' => $team->id,
                'team' => $team->name,
                'played' => $team->fixturesPlayed(),
                'won' => $team->winCount(),
                'drawn' => $team->drawCount(),
                'lost' => $team->defeatCount(),
                'goal_difference' => $team->goalDifference(),
                'points' => $team->pointsForContext('result_points'),
                'score_points' => $team->pointsForContext('score_points'),
                'goalscorer_points' => $team->pointsForContext('goalscorer_points'),
                'trophy_points' => $team->pointsForContext('trophy_points'),
                'total_points' => $team->pointsForKey($gameRulesKeys),
                'price' => $team->formattedPrice,
            ];
        });
    }        

    /**
     * Get the competition's slug.
     */
    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::slug($this->name),
        );
    }
}
