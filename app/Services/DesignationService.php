<?php

namespace App\Services;

use App\Repositories\DesignationRepository;

class DesignationService extends BaseService
{
    public function __construct(DesignationRepository $repo)
    {
        parent::__construct($repo);
    }

}
