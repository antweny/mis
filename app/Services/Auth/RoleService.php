<?php

namespace App\Services\Auth;

use App\Services\BaseService;
use App\Repositories\Auth\RoleRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class RoleService extends BaseService
{
    public function __construct(RoleRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * Get all model resource
     */
    public function get()
    {
        return $this->repo->getWithRelation(['permission']);
    }

    /**
     * Show create new form
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $role = $this->repo->create($request);
            //Check if permission request has data
            isset($request['permissions']) && $this->repo->assignPermission($request['permissions'], $role);
            DB::commit();
            return;
        }
        catch (Exception $e) {
            DB::rollBack();
            error_log($e);
            throw $e;
        }
    }

    /**
     * Show create new form
     */
    public function update($id,$request)
    {
        DB::beginTransaction();
        try {
            $role = $this->repo->update($id,$request);
            isset($request['permissions']) ? $this->repo->updatePermission($request['permissions'],$role) : $this->repo->removePermission($role);  //Update Roles Permission
            DB::commit();
            return;
        }
        catch (Exception $e) {
            DB::rollBack();
            error_log($e);
            throw $e;
        }
    }

}
