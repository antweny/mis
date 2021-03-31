<?php

namespace App\Repository;

use App\Models\Activity;
use App\Repository\Interfaces\ActivityRepositoryInterface;

class ActivityRepository extends BaseRepository implements ActivityRepositoryInterface
{

    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }

    /*
     * Get list of Activities
     */
    public function get()
    {
        return $this->relationshipWith(['employee','output']);
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
