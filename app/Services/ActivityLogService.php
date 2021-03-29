<?php

namespace App\Services;

use App\Repositories\ActivityLogRepository;

class ActivityLogService extends BaseService
{
    public function __construct(ActivityLogRepository $repo)
    {
        parent::__construct($repo);
    }

}
