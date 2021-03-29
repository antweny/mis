<?php

namespace App\Services;

use App\Repositories\LocationRepository;

class LocationService extends BaseService
{
    public function __construct(LocationRepository $repo)
    {
        parent::__construct($repo);
    }

    public function get()
    {
        return $this->repo->get();
    }


}
