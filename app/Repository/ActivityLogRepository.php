<?php

namespace App\Repository;

use App\Models\ActivityLog;
use App\Repository\Interfaces\ActivityLogRepositoryInterface;

class ActivityLogRepository extends BaseRepository implements ActivityLogRepositoryInterface
{
    public function __construct(ActivityLog $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
       return $this->model->with('user')->orderBy('created_at','desc')->paginate(50);
    }

}
