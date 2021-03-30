<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Requests\PasswordChangeRequest;
use App\Repository\Interfaces\UserRepositoryInterface;
use Exception;

class PasswordResetController extends AuthController
{
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Show Password user Reset form
     */
    public function showResetForm($id)
    {
        $this->canUpdate($this->user->model()); //Check user permission

        try {
            $user = $this->user->find($id);
            return view('auth.passwords.password_reset',compact('user'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Reset Password
     */
    public function reset(PasswordChangeRequest $request, $id)
    {
        $this->canUpdate($this->user->model()); //Check user permission
        try {
            $this->user->resetPassword($id, $request->validated());
            return $this->successRoute('users.index','Password Reset Successful');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

}
