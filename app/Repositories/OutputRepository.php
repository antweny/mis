<?php

namespace App\Repositories;

use App\Models\Output;

class OutputRepository extends BaseRepository
{

    public function __construct(Output $model)
    {
        parent::__construct($model);
    }

    public function withRelation()
    {
        return $this->getWithRelation(['outcome']);
    }

    public function getCurrentYearOutput()
    {
        return $this->model->getCurrentYearOutput();
    }

    public function addIndicator($output, $indicators)
    {
        return $output->indicator()->attach($indicators);
    }

    public function updateIndicator($output, $indicators)
    {
        return $output->indicator()->sync($indicators);
    }

}
