<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\AuthController;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\UserService;
use Exception;

class ChangePasswordController extends AuthController
{
    private $userService;

    public function __construct(UserService $user)
    {
        parent::__construct();
        $this->userService = $user;
    }


    /**
     * Show Change Password Form
     */
    public function showPasswordChangeForm()
    {
        try {
            $user = $this->userService->find(auth()->user()->id);
            return view('users.change_password',compact('user'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Reset Password
     */
    public function changePassword(ChangePasswordRequest $request, $id)
    {
        try {
            $this->userService->passwordReset($id, $request->validated());
            return $this->successRoute('dashboard.index','Password Change Successful');
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->errorWithInput($request);
        }
    }

}
