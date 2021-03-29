<?php

namespace App\Services;

use App\Repositories\JobTypeRepository;

class JobTypeService extends BaseService
{
    public function __construct(JobTypeRepository $repo)
    {
        parent::__construct($repo);
    }




}
