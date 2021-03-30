<?php

namespace App\Services;

use App\Repositories\ResourcePeopleRepository;

class ResourcePeopleService extends BaseService
{
    public function __construct(ResourcePeopleRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * Get collection with relationship model
     */
    public function withRelation()
    {
        return $this->repo->withRelation();
    }

}
