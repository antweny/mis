<?php

namespace App\Services;

use App\Repositories\JobTitleRepository;

class JobTitleService extends BaseService
{
    public function __construct(JobTitleRepository $repo)
    {
        parent::__construct($repo);
    }

}
