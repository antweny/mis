<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignationRequest;
use App\Repository\Interfaces\DesignationRepositoryInterface;use Exception;

class DesignationController extends AuthController
{

    /**
     * @var
     */
    protected $interface;

    /**
     * DesignationController constructor.
     */
    public function __construct(DesignationRepositoryInterface $interface)
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
            $designations = $this->interface->paginate();  //Get all designations
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
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
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
        $this->canUpdate($this->interface->model());

        try {
            $designation = $this->interface->find($id);
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
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->validated());
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
        $this->canDelete($this->interface->model());

        try {
            $this->interface->delete($id);
            return $this->success('Designation deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
