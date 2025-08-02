<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
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
            'home' => $this->home_team->name,
            'away' => $this->away_team->name,
            'formattedScore' => $this->formattedScore,
            'home_score' => $this->home_team_score,
            'away_score' => $this->away_team_score,
            'league' => $this->league->name,
            'country' => $this->league->country,
            'kickoff_at' => $this->kickoff_at,
            'is_processed' => $this->is_processed,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
