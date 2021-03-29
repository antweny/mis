<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Requests\Auth\PermissionRequest;
use App\Services\Auth\PermissionService;
use Exception;

class PermissionController extends AuthController
{
    /**
     * @var
     */
    private $permissionService;

    /**
     * PermissionController constructor.
     */
    public function __construct(PermissionService $permissionService)
    {
        parent::__construct();
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->permissionService->model());

        try {
            $permissions = $this->permissionService->get();
            return view('auth.permissions.index',compact('permissions'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $this->canCreate($this->permissionService->model());

        try {
            $this->permissionService->create($request->validated());
            return $this->success('Permission created');
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
        $this->canUpdate($this->permissionService->model());

        try {
            $permission = $this->permissionService->find($id);
            return view('auth.permissions.edit',compact('permission'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request,$id)
    {
        $this->canUpdate($this->permissionService->model());

        try {
            $this->permissionService->update($id,$request->validated());
            return $this->successRoute('permissions.index','Permission updated!');
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
        $this->canDelete($this->permissionService->model());

        try {
            $this->permissionService->delete($id);
            return $this->success('Permission deleted!');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }



}
