<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationGroupRequest;
use App\Repository\Interfaces\OrganizationGroupRepositoryInterface;
use Exception;

class OrganizationGroupController extends AuthController
{
    /**
     * @var
     */
    protected $interface;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(OrganizationGroupRepositoryInterface $interface)
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
            $organizationGroups = $this->interface->get();  //Get all titles
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
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
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
        $this->canUpdate($this->interface->model());

        try {
            $organizationGroup = $this->interface->find($id);
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
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->validated());
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
        $this->canDelete($this->interface->model());

        try {
            $this->interface->delete($id);
            return $this->success('Organization Group deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
