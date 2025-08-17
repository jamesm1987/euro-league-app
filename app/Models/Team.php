<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'api_id',
        'name',
        'display_name',
        'competition_id '
    ];

    protected $appends = ['formatted_price'];
    
    public function league()
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }

    protected function displayName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->display_name ?? $this->name
        );
    }

    protected function formattedPrice(): Attribute

    {

        return Attribute::make(

            get: fn () => "£{$this->price}m",

        );

    }

    public function scopeInLeague($query, string $slug)
    {
        return $query->whereHas('league', fn($q) => $q->where('slug', $slug));
    }

    public function homeFixtures()
    {
        return $this->hasMany(Fixture::class, 'home_team_id');
    }

    public function awayFixtures()
    {
        return $this->hasMany(Fixture::class, 'away_team_id');
    }

    public function fixtures()
    {
        return Fixture::where('home_team_id', $this->id)
                      ->orWhere('away_team_id', $this->id);
    }

    public function results()
    {
        return Fixture::where(function ($query) {
            $query->where('home_team_id', $this->id)
                ->orWhere('away_team_id', $this->id);
        })
        ->whereNotNull('home_team_score')
        ->whereNotNull('away_team_score');
    }

    public function fixturesPlayed()
    {
        return $this->results()->count();
    }

    

    public function goalsScored()
    {
        return $this->homeFixtures()
            ->sum('home_team_score')
            +
            $this->awayFixtures()
            ->sum('away_team_score');
    }

    public function goalsConceded()
    {
        return $this->homeFixtures()
            ->sum('away_team_score')
            +
            $this->awayFixtures()
            ->sum('home_team_score');
    } 
    
    public function goalDifference()
    {
        return $this->goalsScored() - $this->goalsConceded();
    }
    

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function pointsWithRules()
    {
        return $this->points()->with('gameRule', 'pointable');
    }

    public function totalPoints()
    {
        return $this->points()->with('gameRule')->get()->sum(function ($point) {
            return $point->gameRule->points;
        });
    }  

    public function pointsForContext(string $context)
    {
        $points = $this->points()->whereHas('gameRule', function ($query) use ($context) {
            $query->where('context', $context);
        })->with('gameRule')->get();

        return $points->sum(fn($point) => $point->gameRule->points);
    }

    public function pointsForKey(array $keys)
    {
        $points = $this->points()
            ->whereHas('gameRule', function ($query) use ($keys) {
                $query->whereIn('key', $keys);
            })
            ->with('gameRule')
            ->get();

        return $points->sum(fn($point) => $point->gameRule->points);
    }

    public function pointsCountForKey(string $key)
    {
        $points = $this->points()->whereHas('gameRule', function ($query) use ($key) {
            $query->where('key', $key);
        })->with('gameRule')->get();

        return $points->count();
    }

    public function winCount()
    {

        return $this->results()
            ->where(function ($query) {
                $query->where('home_team_id', $this->id)
                    ->whereColumn('home_team_score', '>', 'away_team_score');
            })
            ->orWhere(function ($query) {
                $query->where('away_team_id', $this->id)
                    ->whereColumn('away_team_score', '>', 'home_team_score');
            })->count();

    }

    public function drawCount()
    {

        return $this->results()
            ->where(function ($query) {
                $query->where('home_team_id', $this->id)
                    ->whereColumn('home_team_score', '=', 'away_team_score');
            })->count();

    }


    public function defeatCount()
    {

        return $this->results()
            ->where(function ($query) {
                $query->where('home_team_id', $this->id)
                    ->whereColumn('home_team_score', '<', 'away_team_score');
            })
            ->orWhere(function ($query) {
                $query->where('away_team_id', $this->id)
                    ->whereColumn('away_team_score', '<', 'home_team_score');
            })->count();

    }
}
