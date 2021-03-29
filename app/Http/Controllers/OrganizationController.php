<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\OrganizationRequest;
use App\Services\OrganizationService;
use Exception;

class OrganizationController extends AuthController
{
    /**
     * @var
     */
    protected $organization;

    /**
     * OrganizationController constructor.
     */
    public function __construct(OrganizationService $organizationService)
    {
        parent::__construct();
        $this->organization = $organizationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->organization->model());
        try {
            $organizations = $this->organization->relationWith();  //Get all organizations
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
        $this->canCreate($this->organization->model());

        try {
            $organization = $this->organization->model();
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
        $this->canCreate($this->organization->model());

        try {
            $this->organization->create($request->except('_token'));
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
        $this->canUpdate($this->organization->model());

        try {
            $organization = $this->organization->find($id);
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
        $this->canUpdate($this->organization->model());

        try {
            $this->organization->update($id,$request->except('_token'));
           return $this->successRoute('organizations.index','Organization updated!');
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->organization->model());

        try {
            $this->organization->delete($id);
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
        $this->canCreate($this->organization->model());

        try {
            $this->organization->import($request);
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
        $this->canView($this->organization->model());
        try {
            $organizations = $this->organization->category($category);  //Get all organizations
            return view('organization.index',compact('organizations'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }





}
