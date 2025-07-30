<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRule extends Model
{    

    protected $fillable = [
        'key', 
        'description', 
        'points', 
        'context', 
        'active'
    ];
    
    protected $casts = [
        'active' => 'boolean',
    ];
}
