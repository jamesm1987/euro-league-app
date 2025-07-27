<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRule extends Model
{    

    protected $fillable = [
        'key', 
        'description', 
        'points', 
        'conditions', 
        'active'
    ];
    
    protected $casts = [
        'conditions' => 'array',
        'active' => 'boolean',
    ];
}
