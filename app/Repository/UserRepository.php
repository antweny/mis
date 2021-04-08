<?php

namespace App\Repository;

use App\Events\User\NewUserEvent;
use App\Models\User;
use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * User Repository constructor.
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /*
     * Get All user list
     */
    public function get()
    {
        return $this->relationshipWithPagination(['role']);
    }

    /*
     * Create new User
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $details  = [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $this->passwordGenerator()
            ];
            //Generate Random Password and send to a user
            $request['password'] = $this->encryption($details['password']);
            //user creation
            $user = $this->model->create($request);
            //Assign roles to user
            isset($request['roles']) && $this->assignRoles($user, $request['roles']);
            DB::commit();
            //Send email notification
            event(new NewUserEvent($details));
            return $user;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /*
     * Updating user details
     */
    public function updating($id, $request)
    {
        DB::beginTransaction();
        try {
            //Update the existing resource request
            $user = $this->update($id,$request);
            //Update roles to user
            isset($request['roles']) ? $this->updateRoles($user,$request['roles']) : $this->removeRoles($user);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /*
     * Create Random Password
     */
    private function passwordGenerator()
    {
        return Str::random(10);
    }

    /*
     * Password encryption
     */
    private function encryption($password)
    {
        return Hash::make($password);
    }

    /*
     * Assign Roles to New User
     */
    private function assignRoles($user, $roles) : void { $user->assignRole($roles); }

    /**
     * Update Roles to existing user
     */
    private function updateRoles($user, $roles) : void  { $user->roles()->sync($roles); }

    /**
     * Remove all roles from an existing user user
     */
    private function removeRoles($user) : void  { $user->roles()->detach(); }

    /*
     * Send login credentials
     */
    public function sendLogin($id)
    {
        try {
            $user = $this->find($id);
            //Get the user details
            $details  = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $this->passwordGenerator()
            ];
            //Send Credential email notification
            event(new NewUserEvent($details));
            $request['password'] = $this->encryption($details['password']);
            $this->update($id,$request);
        }
        catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * User Password Reset
     */
    public function resetPassword($id, $request)
    {
        $request['password'] = $this->encryption($request['password']);
        return $this->update($id,$request);
    }

    /*
     * Create user when employee created
     */
    public function createEmployeeUser ($request)
    {
        //Default role of employee
        $request['roles'] = array('employee');
        //Check if user email already exists
        $user = $this->model->uniqueEmail($request['email']);

        if(is_null($user)) {
            return $this->create($request);
        }
        else {
            $this->sendLogin($user->id);
            return $user;
        }

    }



}
