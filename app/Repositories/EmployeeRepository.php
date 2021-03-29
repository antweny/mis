<?php

namespace App\Repositories;

use App\Interfaces\EmployeeInterface;
use App\Models\Employee;

class EmployeeRepository extends BaseRepository implements EmployeeInterface
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    /**
     * Model collection relation
     */
    public function relationWith()
    {
        return $this->getWithRelation([
            'department'=>function($query) { $query->with('employee'); },
            'designation',
            'job_type',
            'user',
            'location']);
    }

    /**
     * Get Active Employee Only
     */
    public function isActive()
    {
        return $this->model->isActive();
    }

    /**
     * Pluck model name and id
     */
    public function getActiveNameId()
    {
        return $this->model->getActiveNameId();
    }

}
