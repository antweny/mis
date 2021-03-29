<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository  implements UserInterface
{
    /**
     * User Repository constructor.
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Create new resource
     */
    public function create($request)
    {
        if($this->userExists($request['email']) == 0)  {
            return $this->model->create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>Hash::make($request['password'])
            ]);
        }
        else {
            return $this->model->where('email',$request['email'])->first();
        }

    }

    /**
     * Create new resource
     */
    public function updateData($id,$request)
    {
        return $this->update($id, $request);
    }

    /**
     * Assign Roles to New User
     */
    public function assignRoles($user, $roles)
    {
        return $user->assignRole($roles);
    }

    /**
     * Update Roles to existing user
     */
    public function updateRoles($user, $roles)
    {
        return $user->roles()->sync($roles);
    }

    /**
     * Remove all roles from an existing user user
     */
    public function removeRoles($user)
    {
        return $user->roles()->detach();
    }

    /**
     * Check if the email requested already registered
     */
    private function userExists($email)
    {
        return $this->model->where('email',$email)->count();
    }









}
