<?php

namespace App\Services;

use App\Repositories\OrganizationGroupRepository;

class OrganizationGroupService extends BaseService
{
    public function __construct(OrganizationGroupRepository $repo)
    {
        parent::__construct($repo);
    }

}
