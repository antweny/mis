<?php

namespace App\Repository;

use App\Models\JobTitle;
use App\Repository\Interfaces\JobTitleRepositoryInterface;

class JobTitleRepository extends BaseRepository implements JobTitleRepositoryInterface
{
    /**
     * Job Title Repository constructor.
     */
    public function __construct(JobTitle $model)
    {
        parent::__construct($model);
    }

}
