<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository extends BaseRepository
{
    /**
     * Department Repository constructor.
     */
    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

}
