<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Repository\Interfaces\UserRepositoryInterface;
use Exception;

class UserController extends AuthController
{
    /**
     * @var
     */
    protected $interface;

    /**
     * UserController constructor.
     */
    public function __construct(UserRepositoryInterface $interface)
    {
        parent::__construct();
        $this->interface = $interface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->interface->model()); //Check user permission

        try {
            $users = $this->interface->get();
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
        $this->canCreate($this->interface->model()); //Check user permission

        try {
            $this->interface->create($request->validated());
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
        $this->canUpdate($this->interface->model()); //Check user permission

        try {
            $user = $this->interface->find($id);
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
        $this->canUpdate($this->interface->model()); //Check user permission

        try {
            $this->interface->update($id, $request->validated());
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
        $this->canView($this->interface->model());  //Check user permission

        try {
            $this->interface->delete($id);
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
        $this->canUpdate($this->interface->model()); //Check user permission

        try {
            $this->interface->sendLoginCredential($id);
            return $this->success('User credentials has been sent successful');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
