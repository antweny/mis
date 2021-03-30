<?php

namespace App\Services;

use App\Repositories\DashboardRepository;

class DashboardService
{
    protected $repo;

    public function __construct(DashboardRepository $repo)
    {
        $this->repo = $repo;
    }

    public function individual()
    {
        return $this->repo->individual();
    }

    public function organization()
    {
        return $this->repo->organization();
    }

    public function kc()
    {
        return $this->repo->kc();
    }

}
