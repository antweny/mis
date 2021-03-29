<?php

namespace App\Repositories;

use App\Models\LeaveType;


class LeaveTypeRepository extends BaseRepository
{
    public function __construct(LeaveType $model)
    {
        parent::__construct($model);
    }

}
