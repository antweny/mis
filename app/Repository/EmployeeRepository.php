<?php

namespace App\Repository;

use App\Models\Employee;
use App\Models\User;
use App\Repository\Interfaces\EmployeeRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    /*
     *
     */
    private $user;

    /**
     * Employee Repository constructor.
     */
    public function __construct(Employee $model, UserRepository $user)
    {
        parent::__construct($model);
        $this->user = $user;
    }

    /*
     * Get all employee with relation
     */
    public function getWith()
    {
        return $this->relationshipWith([
            'department' => function($query) {
                $query->with('employee');
            },
            'designation',
            'job_type',
            'user',
            'location'
        ]);
    }

    /*
     * Get all employee with relation
     */
    public function getWithPagination()
    {
        return $this->relationshipWithPagination([
            'department' => function($query) {
                $query->with('employee');
            },
            'designation',
            'job_type',
            'user',
            'location'
        ]);
    }

    /**
     * Create New employee
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            //Get User Collection
            $user = $this->user->createEmployeeUser($request);
            //get registration user id
            $request['user_id'] = $user->id;
            //create employee
            $this->model->create($request);
            DB::commit();
            return true;
        }
        catch (Exception $e){
            DB::rollBack();
        }
    }

}
