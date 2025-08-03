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
        'league_id'
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

    public function points()
    {
        return '';
    }

}
