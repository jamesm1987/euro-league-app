<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApiLookup extends Model
{
    protected $fillable = [
        'endpoint',
        'response',
        'lookup_at',
    ];
}
