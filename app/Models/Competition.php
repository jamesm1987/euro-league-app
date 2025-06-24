<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'name',
        'type',
        'country',
        'api_id',
    ];

    public function teams()
    {
        return $this->hasMany(Team::class, 'competition_id');
    }
}
