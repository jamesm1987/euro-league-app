<?php

namespace App\Relations;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;

class TeamResults extends Relation
{
    protected $team;

    public function __construct($team, Builder $query)
    {
        parent::__construct($query, $team);
        $this->team = $team;
    }

    public function addConstraints()
    {
        if ($this->team->exists) {
            $this->applyTeamConstraint($this->query, [$this->team->id]);
        }
    }

    protected function applyTeamConstraint(Builder $query, array $ids)
    {
        $query->where(function ($q) use ($ids) {
            $q->whereIn('home_team_id', $ids)
              ->orWhereIn('away_team_id', $ids);
        })
        ->whereNotNull('home_team_score')
        ->whereNotNull('away_team_score');
    }

    public function addEagerConstraints(array $models)
    {
        $ids = collect($models)->pluck('id')->all();

        $this->query->where( function ($query) use ($ids) {
            $query->whereIn('home_team_id', $ids)
                ->orWhereIn('away_team_id', $ids);
        })
        ->whereNotNull('home_team_score')
        ->whereNotNull('away_team_score');
    }

    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, new Collection());
        }

        return $models;
    }

    public function match(array $models, Collection $results, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation(
                $relation,
                $results->filter(fn($result) =>
                    $result->home_team_id === $model->id ||
                    $result->away_team_id === $model->id
                )
            );
        }
        return $models;
    }

    public function getResults()
    {
        return $this->query->get();
    }
}