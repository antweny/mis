<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Requests\Auth\RoleRequest;
use App\Services\Auth\RoleService;
use Exception;

class RoleController extends AuthController
{
    /**
     * @var
     */
    private $roleService;

    /**
     * RoleController constructor.
     */
    public function __construct(RoleService $roleService)
    {
        parent::__construct();
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->roleService->model());

        try {
            $roles = $this->roleService->get();
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
        $this->canCreate($this->roleService->model());

        try {
            $this->roleService->create($request->validated());
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
        $this->canUpdate($this->roleService->model());

        try {
            $role = $this->roleService->find($id);
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
        $this->canUpdate($this->roleService->model());

        try {
            $this->roleService->update($id,$request->validated());
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
        $this->canDelete($this->roleService->model());

        try {
            $this->roleService->delete($id);
            return $this->success('Role deleted!');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
