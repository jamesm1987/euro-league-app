<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FixtureResource;
use App\Http\Resources\ResultResource;

class TeamResource extends JsonResource
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
            'api_id' => $this->api_id,
            'name' => $this->name,
            'price' => $this->price,
            'formatted_price' => $this->formatted_price,
            'league' => $this->league->name,
            'country' => $this->league->country,
            'fixtures' => FixtureResource::collection($this->fixtures()->get()),
            'results' => ResultResource::collection($this->results()->get()),
            'total_points' => $this->totalPoints(),
            'win_count' => $this->pointsCountForKey('win'),
            'draw_count' => $this->pointsCountForKey('draw'),
            'score_home_win_count' => $this->pointsCountForKey('home_win'),
            'score_home_defeat_count' => $this->pointsCountForKey('home_defeat'),
            'score_away_win_count' => $this->pointsCountForKey('home_win'),
            'score_away_defeat_count' => $this->pointsCountForKey('away_defeat'),            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

