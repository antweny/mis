<?php

namespace App\Repositories;
use App\Models\Individual;
use App\Models\Organization;

class DashboardRepository
{
    protected $individual;
    protected $organization;

    public function __construct()
    {
        $this->individual = new Individual;
        $this->organization = new Organization;
    }

    public function individual()
    {
        return $this->individual->count();
    }

    public function organization()
    {
        return $this->organization->count();
    }

    public function kc()
    {
        return $this->organization
            ->leftJoin('organization_categories','organizations.organization_category_id','=','organization_categories.id')
            ->where('organization_categories.name','Knowledge Center')
            ->count();
    }

}
