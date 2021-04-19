<?php

namespace App\Repository;

use App\Models\Department;
use App\Repository\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    /**
     * Department Repository constructor.
     */
    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    /**
     *
     */
    public function get()
    {
       return $this->relationshipWithPagination(['employee']);
    }


    /*
    * Get number of employees per department
    */
    public function numberOfEmployeePerDepartment()
    {
       return $this->model->withCount('employee')->get();
    }
}
