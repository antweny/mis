<?php

namespace App\Repositories;

use App\Models\ActivityLog;

class ActivityLogRepository extends BaseRepository
{
    public function __construct(ActivityLog $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
       return $this->model->with('user')->orderBy('created_at','desc')->get();
    }

}
