<?php

namespace App\Repository;

use App\Models\JobType;
use App\Repository\Interfaces\JobTypeRepositoryInterface;

class JobTypeRepository extends BaseRepository implements JobTypeRepositoryInterface
{
    /**
     * Job Type Repository constructor.
     */
    public function __construct(JobType $model)
    {
        parent::__construct($model);
    }

}
