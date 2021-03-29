<?php

namespace App\Services\Auth;

use App\Services\BaseService;
use App\Repositories\Auth\PermissionRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class PermissionService extends BaseService
{

    public function __construct(PermissionRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * Get all model resource
     */
    public function get()
    {
        return $this->repo->getWithRelation(['role']);
    }

    /**
     * Show create new form
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $permission = $this->repo->create($request);
            //Check if permission request has data
            isset($request['roles']) && $this->repo->assignRoles($request['roles'], $permission);
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
            $permission = $this->repo->update($id,$request);
            isset($request['roles']) ? $this->repo->updateRoles($permission,$request['roles']) : $this->repo->removeRoles($permission);
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
