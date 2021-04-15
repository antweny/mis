<?php

namespace App\Repository\Interfaces;

interface DepartmentRepositoryInterface extends BaseRepositoryInterface
{

    /*
     * Get number of employees per department
     */
    public function numberOfEmployeePerDepartment();

}
