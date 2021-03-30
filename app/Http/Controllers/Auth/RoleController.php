<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Requests\RoleRequest;
use App\Repository\Interfaces\RoleRepositoryInterface;
use Exception;

class RoleController extends AuthController
{
    /**
     * @var
     */
    private $interface;

    /**
     * RoleController constructor.
     */
    public function __construct(RoleRepositoryInterface $interface)
    {
        parent::__construct();
        $this->interface = $interface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->interface->model());

        try {
            $roles = $this->interface->get();
            return view('auth.roles.index', compact('roles'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
            return $this->success('Role created');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        $this->canUpdate($this->interface->model());

        try {
            $role = $this->interface->find($id);
            return view('auth.roles.edit',compact('role'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request,$id)
    {
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->updating($id,$request->validated());
            return $this->successRoute('roles.index','Role updated!');
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
        $this->canDelete($this->interface->model());

        try {
            $this->interface->delete($id);
            return $this->success('Role deleted!');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
