<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;
use App\Models\Permission;
use App\Models\Role;

class RoleRepository extends BaseRepository
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
     * Update existing role
     */
    public function update($id,$request)
    {
        $role = $this->find($id);
        $role->name = $request['name'];
        $role->desc = $request['desc'];
        $role->save();
        return $role;
    }

    /**
     * Assign Permissions To roles
     */
    public function assignPermission($permissions, $role)
    {
        foreach ($permissions as $permission) {
            $per = $this->permission->find($permission); //Match input permission to db record
            $role->givePermissionTo($per);
        }
        return;
    }

    /**
     * Update ZRole Permission
     */
    public function updatePermission($permissions, $role)
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
