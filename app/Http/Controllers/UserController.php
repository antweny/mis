<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repository\Interfaces\UserRepositoryInterface;
use Exception;

class UserController extends AuthController
{
    /* @var  */
    protected $user;

    /* UserController constructor. */
    public function __construct(UserRepositoryInterface $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /* Display a listing of the resource. */
    public function index()
    {
        $this->canView($this->user->model()); //Check user permission
        try {
            $users = $this->user->get();
            return view('users.index',compact('users'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /* Store a newly created resource in storage. */
    public function store(UserRequest $request)
    {
        $this->canCreate($this->user->model()); //Check user permission
        try {
            $this->user->create($request->validated());
            return $this->success('User created');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /* Show the form for editing the specified resource. */
    public function edit($id)
    {
        $this->canUpdate($this->user->model()); //Check user permission
        try {
            $user = $this->user->find($id);
            return view('users.edit',compact('user'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /*  Update the specified resource in storage. */
    public function update(UserRequest $request,$id)
    {
        $this->canUpdate($this->user->model()); //Check user permission
        try {
            $this->user->updating($id, $request->validated());
            return $this->successRoute('users.index','User updated!');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        $this->canView($this->user->model());  //Check user permission
        try {
            $this->user->delete($id);
            return $this->success('User has been deleted!');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /*  Permanent delete resource. */
    public function sendNewPassword($id)
    {
        $this->canUpdate($this->user->model());
        try {
            $this->user->sendNewPassword($id);
            return $this->success('Password Sent Successful');
        }
        catch (\Exception $e) {
            dd($e->getMessage());
            return $this->error();
        }
    }
}
