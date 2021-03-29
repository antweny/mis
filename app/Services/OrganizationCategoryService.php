<?php

namespace App\Services;

use App\Repositories\OrganizationCategoryRepository;

class OrganizationCategoryService extends BaseService
{
    public function __construct(OrganizationCategoryRepository $repo)
    {
        parent::__construct($repo);
    }


    /**
     * Get Organization Category ID
     */
    public function getId($val)
    {
        return $this->repo->findOrCreate($val);
    }

}
