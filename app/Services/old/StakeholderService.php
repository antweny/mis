<?php

namespace App\Services;

use App\Repositories\StakeholderRepository;

class StakeholderService extends BaseService
{
    public function __construct(StakeholderRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * Get Model with Relationship
     */
    public function withRelation()
    {
        return $this->repo->relationWith();
    }

    /**
     * Get List of Donors
     */
    public function getDonors()
    {
        return $this->repo->getDonors();
    }
}
