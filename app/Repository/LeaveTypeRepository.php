<?php

namespace App\Repository;

use App\Models\LeaveType;
use App\Repository\Interfaces\LeaveTypeRepositoryInterface;

class LeaveTypeRepository extends BaseRepository implements LeaveTypeRepositoryInterface
{

    public function __construct(LeaveType $model)
    {
        parent::__construct($model);
    }

}
