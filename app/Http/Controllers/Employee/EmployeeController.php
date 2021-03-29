<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\AuthController;
use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService;
use Exception;

class EmployeeController extends AuthController
{
    /**
     * @var
     */
    protected $employeeService;

    /**
     * EmployeeController constructor.
     */
    public function __construct(EmployeeService $employeeService)
    {
        parent::__construct();
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->employeeService->model());

        try {
            $employees = $this->employeeService->get();  //Get all employees
            return view('employee.index',compact('employees'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $this->canCreate($this->employeeService->model());

        try {
            $employee = $this->employeeService->model();  //Get all employees
            return view('employee.create',compact('employee'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $this->canCreate($this->employeeService->model());

        try {
            $this->employeeService->create($request->validated());
            return $this->success('New employee created');
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        $this->canView($this->employeeService->model());

        try {
            $employee = $this->employeeService->find($id);
            return view('employee.show',compact('employee'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->employeeService->model());

        try {
            $employee = $this->employeeService->find($id);
            return view('employee.edit',compact('employee'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, $id)
    {
        $this->canUpdate($this->employeeService->model());

        try {
            $this->employeeService->update($id,$request->validated());
            return $this->successRoute('employees.index','Employee updated');
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
        $this->canDelete($this->employeeService->model());

        try {
            $this->employeeService->delete($id);
            return $this->success('Employee deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

}
