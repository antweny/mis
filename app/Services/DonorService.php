<?php

namespace App\Services;

use App\Repositories\DonorRepository;


class DonorService extends BaseService
{
    public function __construct(DonorRepository $repo)
    {
        parent::__construct($repo);
    }

    public function get()
    {
        return $this->repo->get();
    }

}
