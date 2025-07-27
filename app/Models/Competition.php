<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

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

    public function teams()
    {
        return $this->hasMany(Team::class, 'competition_id');
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
