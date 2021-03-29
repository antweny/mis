<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignationRequest;
use App\Services\DesignationService;
use Exception;

class DesignationController extends AuthController
{

    /**
     * @var
     */
    protected $designationService;

    /**
     * DesignationController constructor.
     */
    public function __construct(DesignationService $designationService)
    {
        parent::__construct();
        $this->designationService = $designationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->designationService->model());

        try {
            $designations = $this->designationService->get();  //Get all designations
            return view('designations.index',compact('designations'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DesignationRequest $request)
    {
        $this->canCreate($this->designationService->model());

        try {
            $this->designationService->create($request->validated());
            return $this->success('Designation created');
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
        $this->canUpdate($this->designationService->model());

        try {
            $designation = $this->designationService->find($id);
            return view('designations.edit',compact('designation'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DesignationRequest $request, $id)
    {
        $this->canUpdate($this->designationService->model());

        try {
            $this->designationService->update($id,$request->validated());
            return $this->successRoute('designations.index','Designation updated');
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
        $this->canDelete($this->designationService->model());

        try {
            $this->designationService->delete($id);
            return $this->success('Designation deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
