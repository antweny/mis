<?php

namespace App\Repositories;

use App\Models\Activity;

class ActivityRepository extends BaseRepository
{

    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }


    public function withRelation()
    {
        return $this->getWithRelation(['employee','output']);
    }

    public function dropdown()
    {
        return $this->model->getIdNameDesc();
    }

    public function activityComposer()
    {
        return $this->model->currentYearActivityDropdown();
    }

}
