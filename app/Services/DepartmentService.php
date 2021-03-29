<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService extends BaseService
{
    public function __construct(DepartmentRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * Get all model resource
     */
    public function get()
    {
        return $this->repo->getWithRelation(['employee']);
    }


}
