<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\OrganizationRequest;
use App\Repository\Interfaces\OrganizationRepositoryInterface;
use Exception;

class OrganizationController extends AuthController
{
    /**
     * @var
     */
    protected $interface;

    /**
     * OrganizationController constructor.
     */
    public function __construct(OrganizationRepositoryInterface $interface)
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
            $organizations = $this->interface->get();  //Get all organizations
            return view('organization.index',compact('organizations'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->canCreate($this->interface->model());

        try {
            $organization = $this->interface->model();
            return view('organization.create',compact('organization'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationRequest $request)
    {
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
            return $this->success('Organization created');
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
            $organization = $this->interface->find($id);
            return view('organization.edit',compact('organization'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationRequest $request,$id)
    {
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->except('_token'));
           return $this->successRoute('organizations.index','Organization updated!');
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
            return $this->success('Organization deleted!');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Import Batch of file.
     */
    public function import(ImportFileRequest $request)
    {
        $this->canCreate($this->interface->model());

        try {
            $this->interface->import($request);
            return $this->success('Individual imported successfully!');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function category($category)
    {
        $this->canView($this->interface->model());
        try {
            $organizations = $this->interface->category($category);  //Get all organizations
            return view('organization.index',compact('organizations'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }





}
