<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Services\DepartmentService;
use Exception;

class DepartmentController extends AuthController
{
    /**
     * @var
     */
    private $departmentService;

    /**
     * DepartmentController constructor.
     */
    public function __construct(DepartmentService $departmentService)
    {
        parent::__construct();
        $this->departmentService = $departmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->departmentService->model());

        try {
            $departments = $this->departmentService->get();  //Get all departments
            return view('departments.index',compact('departments'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $this->canCreate($this->departmentService->model());

        try {
            $this->departmentService->create($request->validated());
            return $this->success('Department created');
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
        $this->canUpdate($this->departmentService->model());

        try {
            $department = $this->departmentService->find($id);
            return view('departments.edit',compact('department'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, $id)
    {
        $this->canUpdate($this->departmentService->model());

        try {
            $this->departmentService->update($id,$request->validated());
            return $this->successRoute('departments.index','Department updated');
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
        $this->canDelete($this->departmentService->model());

        try {
            $this->departmentService->delete($id);
            return $this->success('Department deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
