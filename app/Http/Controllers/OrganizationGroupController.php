<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationGroupRequest;
use App\Services\OrganizationGroupService;
use Exception;

class OrganizationGroupController extends AuthController
{
    /**
     * @var
     */
    protected $organizationGroup;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(OrganizationGroupService $organizationGroupService)
    {
        parent::__construct();
        $this->organizationGroup = $organizationGroupService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->organizationGroup->model());

        try {
            $organizationGroups = $this->organizationGroup->get();  //Get all titles
            return view('organization-groups.index',compact('organizationGroups'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationGroupRequest $request)
    {
        $this->canCreate($this->organizationGroup->model());

        try {
            $this->organizationGroup->create($request->validated());
            return $this->success('Organization Group created');
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
        $this->canUpdate($this->organizationGroup->model());

        try {
            $organizationGroup = $this->organizationGroup->find($id);
            return view('organization-groups.edit',compact('organizationGroup'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationGroupRequest $request, $id)
    {
        $this->canUpdate($this->organizationGroup->model());

        try {
            $this->organizationGroup->update($id,$request->validated());
            return $this->successRoute('organizationGroups.index','Organization Group updated');
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
        $this->canDelete($this->organizationGroup->model());

        try {
            $this->organizationGroup->delete($id);
            return $this->success('Organization Group deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
