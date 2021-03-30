<?php

namespace App\Services;

use App\Repositories\LeaveTypeRepository;

class LeaveTypeService extends BaseService
{
    public function __construct(LeaveTypeRepository $repo)
    {
        parent::__construct($repo);
    }

}
