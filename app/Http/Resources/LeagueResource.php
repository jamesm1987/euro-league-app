<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeagueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'country' => $this->country,
            'updated_at' => $this->updated_at,
            'league_table' => $this->getLeagueTable(),
            'score_points_table' => $this->getScorePointsTable(),
            'total_points_table' => $this->getTotalPointsTable(),
        ];
    }
}
