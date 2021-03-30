<?php

namespace App\Repository;

use App\Models\Permission;
use App\Models\Role;
use App\Repository\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Exception;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * @var
     */
    private $permission;

    /**
     * Role Repository constructor.
     */
    public function __construct(Role $model, Permission $permission)
    {
        parent::__construct($model);
        $this->permission = $permission;
    }

    /**
     *Get list of roles with permission relation and paginate
     */
    public function get()
    {
      return $this->relationshipWithPagination(['permission']);
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            isset($request['permissions']) && $this->assignPermission($request['permissions'], $this->model->create($request));
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param $id
     * @param array $attributes
     */
    public function updating($id, $request)
    {
        DB::beginTransaction();
        try {
            $role = $this->update($id,$request);
            isset($request['permissions']) ? $this->updatePermission($request['permissions'],$role) : $this->removePermission($role);  //Update Roles Permission
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
     * Assign Permissions to Roles
     */
    private function assignPermission ($permissions,$role) : void
    {
        foreach ($permissions as $permission) {
            $per = $this->permission->find($permission); //Match input permission to db record
            $role->givePermissionTo($per);
        }
    }

    /**
     * Assign Permissions to Roles
     */
    private function updatePermission ($permissions,$role)
    {
        return $role->permissions()->sync($permissions);
    }

    /**
     * Remove all permissions from Role
     */
    public function removePermission($role)
    {
        return $role->permissions()->detach();
    }


}
