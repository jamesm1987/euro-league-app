<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'api_lookups';

    protected $fillable = [
        'endpoint',
        'response',
        'lookup_at',
    ];
}
