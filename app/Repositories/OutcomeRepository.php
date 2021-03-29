<?php

namespace App\Repositories;

use App\Models\Outcome;

class OutcomeRepository extends BaseRepository
{
    public function __construct(Outcome $model)
    {
        parent::__construct($model);
    }

    public function getCurrentYearOutcome()
    {
        return $this->model->getCurrentYearOutcome();
    }

    public function addIndicator($outcome, $indicators)
    {
        return $outcome->indicator()->attach($indicators);
    }

    public function updateIndicator($outcome, $indicators)
    {
        return $outcome->indicator()->sync($indicators);
    }
}
