<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationCategoryRequest;
use App\Repository\Interfaces\OrganizationCategoryRepositoryInterface;
use Exception;

class OrganizationCategoryController extends AuthController
{
    /**
     * @var
     */
    protected $interface;

    /**
     * Organization CategoryController constructor.
     */
    public function __construct(OrganizationCategoryRepositoryInterface $interface)
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
            $organizationCategories = $this->interface->get();  //Get all organizationCategories
            return view('organization.categories.index',compact('organizationCategories'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationCategoryRequest $request)
    {
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
            return $this->success('Organization Category created');
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
            $organizationCategory = $this->interface->find($id);
            return view('organization.categories.edit',compact('organizationCategory'));
        }
        catch (Exception $e) {
          return $this->error();
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationCategoryRequest $request, $id)
    {
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->validated());
            return $this->successRoute('organizationCategories.index','Organization Category updated');
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
            return $this->success('Organization Category moved to trash');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
