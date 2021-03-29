<?php

namespace App\Services;

use App\Events\User\NewUserEvent;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService extends BaseService
{
    /**
     * UserService constructor.
     */
    public function __construct(UserRepository $repo)
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
            //Generate Random Password and send to a user
            $request['password'] = $this->passwordGenerator();
            //Store new resource request
            $user = $this->repo->create($request);
            //Assign roles to user
            isset($request['roles']) && $this->repo->assignRoles($user, $request['roles']);
            DB::commit();
            //Event to be called
            event(new NewUserEvent($request));
            return $user;
        }
        catch (Exception $e) {
            DB::rollBack();
            error_log($e);
            throw $e;
        }
    }

    /**
     * Show create new form
     * @throws Exception
     */
    public function update($id,$request)
    {
        DB::beginTransaction();
        try {
            //Update the existing resource request
            $user = $this->repo->updateData($id,$request);
            //Update roles to user
            isset($request['roles']) ? $this->repo->updateRoles($user,$request['roles']) : $this->repo->removeRoles($user);
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
     * Password Change Request
     */
    public function passwordReset($id,$request)
    {
        $request['password'] = Hash::make($request['password']);

        return $this->repo->update($id,$request);
    }

    /**
     * Remove all roles from an existing user user
     */
    private function passwordGenerator()
    {
        return Str::random(10);
    }

    /**
     *
     */
    public function sendLoginCredential($id)
    {
        try {
            $user = $this->repo->find($id);

            $request['name'] = $user->name;
            $request['email'] = $user->email;
            $request['password'] = $this->passwordGenerator();

            event(new NewUserEvent($request));

            $request['password'] = Hash::make($request['password']);

            $this->repo->update($id,$request);
        }
        catch (Exception $e) {
            error_log($e);
            throw $e;
        }

    }

}
