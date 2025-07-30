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

}
