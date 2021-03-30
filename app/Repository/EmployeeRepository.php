<?php

namespace App\Repository;

use App\Models\Employee;
use App\Repository\Interfaces\EmployeeRepositoryInterface;
use Exception;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    /**
     * Employee Repository constructor.
     */
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    /*
     * Get all employee with relation
     */
    public function get()
    {
        return $this->relationshipWithPagination([
//            'department' => function($query) {
//                $query->with('employee');
//            },
            'department',
            'designation',
            'job_type',
            'user',
            'location'
        ]);
    }


    /**
     * Create New employee
     */
    public function create(array $attributes)
    {
        try {
            $request['roles'] = array('employee');


        }
        catch (Exception $e){

        }
    }

}
