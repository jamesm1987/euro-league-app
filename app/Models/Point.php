<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Point extends Model
{
    protected $fillable = [
        'team_id',
        'game_rule_id',
        'pointable_type',
        'pointable_id',
    ];

    /**
     * The team that earned the points.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * The rule that awarded the points.
     */
    public function gameRule(): BelongsTo
    {
        return $this->belongsTo(GameRule::class);
    }

    /**
     * The entity this point record is related to (e.g., Fixture, Competition, etc.).
     */
    public function pointable(): MorphTo
    {
        return $this->morphTo();
    }
}
