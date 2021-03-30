<?php

namespace App\Repository;

use App\Models\Permission;
use App\Models\Role;
use App\Repository\Interfaces\PermissionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Exception;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * @var Role
     */
    private $role;

    /**
     * Permission Repository constructor.
     */
    public function __construct(Permission $model, Role $role)
    {
        parent::__construct($model);
        $this->role = $role;
    }


    /**
     * Get all permission with relationship and paginate
     */
    public function get()
    {
        return $this->relationshipWithPagination(['role']);
    }

    /**
     * Create new resorce
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            //Check if permission request has data
            isset($request['roles']) && $this->assignRoles($request['roles'], $this->model->create($request));
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Update Specific resource
     */
    public function updating($id,$request)
    {
        DB::beginTransaction();
        try {
            $permission = $this->update($id,$request);
            isset($request['roles']) ? $this->updateRoles($permission,$request['roles']) : $this->removeRoles($permission);
            DB::commit();
            return;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Assign Permissions To roles
     */
    private function assignRoles($roles,$permission) : void
    {
        //If one or more role is selected
        foreach ($roles as $role) {
            $r = $this->role->find($role); //Match input role to db record
            $r->givePermissionTo($permission);
        }
    }

    /**
     * Update Permission to Roles
     */
    private function updateRoles($permission, $roles) :void
    {
        $permission->roles()->sync($roles);
    }

    /**
     * Remove all roles from permission
     */
    private function removeRoles($permission) : void
    {
        $permission->roles()->detach();
    }


}
