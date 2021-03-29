<?php

namespace App\Services;

use App\Repositories\IndividualGroupRepository;

class IndividualGroupService extends BaseService
{
    public function __construct(IndividualGroupRepository $repo)
    {
        parent::__construct($repo);
    }

}
