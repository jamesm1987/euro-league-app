<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FixtureResource extends JsonResource
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
            'league' => $this->league->name,
            'country' => $this->league->country,
            'kickoff_at' => $this->kickoff_at,
            'is_processed' => $this->is_processed,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
