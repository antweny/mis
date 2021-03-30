<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class EmployeeService extends BaseService
{
    private $user;

    public function __construct(EmployeeRepository $repo, UserService $user)
    {
        parent::__construct($repo);
        $this->user = $user;
    }

    /**
     * Get employee with relation models
     */
    public function get()
    {
       return $this->repo->relationWith();
    }

    /**
     * Create and employee and User at the same time
     */
    public function create($request)
    {
        try {
            $request['roles'] = array('employee');
            $user = $this->user->create($request);
            if($user){
                $request['user_id'] = $user->id;
                return $this->repo->create($request);
            }
        }
        catch (\Exception $e) {
            error_log($e);
            throw $e;
        }
    }

}
