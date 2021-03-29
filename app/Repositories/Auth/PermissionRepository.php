<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;
use App\Contracts\PermissionContract;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class PermissionRepository extends BaseRepository
{
    /**
     * @var
     */
    private $role;

    /**
     * Permission Repository constructor.
     */
    public function __construct(Permission $model,Role $role)
    {
        parent::__construct($model);
        $this->role = $role;
    }

    /**
     * Update New Permission
     */
    public function update($id,$request)
    {
        $permission = $this->find($id);
        $permission->name = $request['name'];
        $permission->desc = $request['desc'];
        $permission->save();
        return $permission;
    }

    /**
     * Assign Permissions To roles
     */
    public function assignRoles($roles,$permission)
    {
        //If one or more role is selected
        foreach ($roles as $role) {
            $r = $this->role->find($role); //Match input role to db record
            $r->givePermissionTo($permission);
        }
        return;
    }

    /**
     * Update Permission to Roles
     */
    public function updateRoles($permission, $roles)
    {
        return $permission->roles()->sync($roles);

    }

    /**
     * Remove all roles from permission
     */
    public function removeRoles($permission)
    {
        return $permission->roles()->detach();
    }
}
