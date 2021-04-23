<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Repository\Interfaces\DepartmentRepositoryInterface;
use Exception;

class DepartmentController extends AuthController
{
    /**
     * @var
     */
    private $interface;

    /**
     * DepartmentController constructor.
     */
    public function __construct(DepartmentRepositoryInterface $interface)
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
            $departments = $this->interface->numberOfEmployeePerDepartment();  //Get all departments

            //dd($departments);
            return view('hra.departments.index',compact('departments'));
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
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
        $this->canUpdate($this->interface->model());

        try {
            $department = $this->interface->find($id);
            return view('hra.departments.edit',compact('department'));
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
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->validated());
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
        $this->canDelete($this->interface->model());

        try {
            $this->interface->delete($id);
            return $this->success('Department deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
