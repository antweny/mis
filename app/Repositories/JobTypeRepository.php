<?php

namespace App\Repositories;

use App\Models\JobType;

class JobTypeRepository extends BaseRepository
{
    public function __construct(JobType $model)
    {
        parent::__construct($model);
    }

}
