<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationCategoryRequest;
use App\Services\OrganizationCategoryService;
use Exception;

class OrganizationCategoryController extends AuthController
{
    /**
     * @var
     */
    protected $organizationCategory;

    /**
     * Organization CategoryController constructor.
     */
    public function __construct(OrganizationCategoryService $organizationCategoryService)
    {
        parent::__construct();
        $this->organizationCategory = $organizationCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->organizationCategory->model());

        try {
            $organizationCategories = $this->organizationCategory->get();  //Get all organizationCategories
            return view('organization-categories.index',compact('organizationCategories'));
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
        $this->canCreate($this->organizationCategory->model());

        try {
            $this->organizationCategory->create($request->validated());
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
        $this->canUpdate($this->organizationCategory->model());

        try {
            $organizationCategory = $this->organizationCategory->find($id);
            return view('organization-categories.edit',compact('organizationCategory'));
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
        $this->canUpdate($this->organizationCategory->model());

        try {
            $this->organizationCategory->update($id,$request->validated());
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
        $this->canDelete($this->organizationCategory->model());

        try {
            $this->organizationCategory->delete($id);
            return $this->success('Organization Category moved to trash');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
