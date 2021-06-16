<?php

namespace App\Repository;

use App\Models\User;
use App\Notifications\User\CreateNewUserNotification;
use App\Notifications\User\NewPasswordNotification;
use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /* User Repository constructor. */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /* Get All user list */
    public function get()
    {
        return $this->relationshipWithPagination(['role']);
    }

    /*  Create new User */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $data  = $this->data($request);
            //Generate Random Password and send to a user
            $request['password'] = $this->encryptPassword($data['plain_password']);
            //user creation
            $user = $this->model->create($request);
            //Assign roles to user
            isset($request['roles']) && $this->assignRoles($user, $request['roles']);
            DB::commit();
            //Send email notification
            $user->notify(new CreateNewUserNotification($data['plain_password']));
            return $user;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /* Updating user details */
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

    /* Create Random Password */
    private function randomString($int = 10)
    {
        return Str::random($int);
    }

    /*  Password encryption */
    private function encryptPassword($password)
    {
        return Hash::make($password);
    }

    /* Assign Roles to New User */
    private function assignRoles($user, $roles) : void { $user->assignRole($roles); }

    /**
     * Update Roles to existing user
     */
    private function updateRoles($user, $roles) : void  { $user->roles()->sync($roles); }

    /**
     * Remove all roles from an existing user user
     */
    private function removeRoles($user) : void  { $user->roles()->detach(); }

    /* Return user data */
    private function data($data)
    {
        return [
            'name' =>$data['name'],
            'email' => $data['email'],
            'plain_password' => $this->randomString(),
        ];
    }

    /* User Password Reset */
    public function resetPassword($id, $request)
    {
        $request['password'] = $this->encryptPassword($request['password']);
        return $this->update($id,$request);
    }

    /*  Create user when employee created */
    public function createEmployeeUser ($request)
    {
        $request['roles'] = array('employee');  //Default role of employee
        $user = $this->model->uniqueEmail($request['email']); //Check if user email already exists
        if(!is_null($user)) {
            return $this->sendNewPassword($user->id);
            //return $user;
        }
        else {
            return $this->create($request);
        }
    }

    /* Send New Password to Administrator */
    public function sendNewPassword($id)
    {
        try {
            $user = $this->find($id);
            $data = $this->data($user);
            $user->password = $this->encryptPassword($data['plain_password']);
            $user->save();
            //Notify user
            $user->notify(new NewPasswordNotification($data['plain_password']));
            //Send new password to a user
            return true;
        }
        catch (\Exception $e) {
            throw $e;
        }
    }
}
