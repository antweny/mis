<?php

namespace App\Services;

use App\Repositories\ActivityRepository;

class ActivityService extends  BaseService
{
    public function __construct(ActivityRepository $repo)
    {
        parent::__construct($repo);
    }

    public function withRelation()
    {
        return $this->repo->withRelation();
    }
}
