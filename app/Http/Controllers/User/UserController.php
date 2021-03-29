<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\AuthController;
use App\Http\Requests\User\UserRequest;
use App\Services\UserService;
use Exception;

class UserController extends AuthController
{
    /**
     * @var
     */
    protected $userService;

    /**
     * UserController constructor.
     */
    public function __construct(UserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->userService->model()); //Check user permission

        try {
            $users = $this->userService->get();
            return view('users.index',compact('users'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->canCreate($this->userService->model()); //Check user permission

        try {
            $this->userService->create($request->validated());
            return $this->success('User created');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->userService->model()); //Check user permission

        try {
            $user = $this->userService->find($id);
            return view('users.edit',compact('user'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,$id)
    {
        $this->canUpdate($this->userService->model()); //Check user permission

        try {
            $this->userService->update($id, $request->validated());
            return $this->successRoute('users.index','User updated!');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canView($this->userService->model());  //Check user permission

        try {
            $this->userService->delete($id);
            return $this->success('User has been deleted!');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     *
     */
    public function sendCredential($id)
    {
        $this->canUpdate($this->userService->model()); //Check user permission

        try {
            $this->userService->sendLoginCredential($id);
            return $this->success('User credentials has been sent successful');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
