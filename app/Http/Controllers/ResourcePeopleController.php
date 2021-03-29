<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourcePeopleRequest;
use App\Services\ResourcePeopleService;
use Exception;

class ResourcePeopleController extends AuthController
{
    /**
     * @var
     */
    protected $resourcePeople;

    /**
     * ResourcePeople Controller constructor.
     */
    public function __construct(ResourcePeopleService $resourcePeople)
    {
        parent::__construct();
        $this->resourcePeople = $resourcePeople;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->resourcePeople->model());

        try {
            $resourcePeople = $this->resourcePeople->withRelation();  //Get all resourcePeoples
            return view('resource-people.index',compact('resourcePeople'));
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
        $this->canCreate($this->resourcePeople->model());

        try {
            $resourcePeople = $this->resourcePeople->model();
            return view('resource-people.create',compact('resourcePeople'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResourcePeopleRequest $request)
    {
        $this->canCreate($this->resourcePeople->model());

        try {
            $this->resourcePeople->create($request->validated());
            return  $this->success('Resource Person Added');
        }
        catch (\Exception $e) {
            return  $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->resourcePeople->model());

        try {
            $resourcePeople = $this->resourcePeople->find($id);
            return view('resource-people.edit',compact('resourcePeople'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResourcePeopleRequest $request, $id)
    {
        $this->canUpdate($this->resourcePeople->model());

        try {
            $this->resourcePeople->update($id,$request->validated());
            return  $this->successRoute('resourcePeople.index','Resource Person updated');
        }
        catch (\Exception $e) {
            return  $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->resourcePeople->model());

        try {
            $this->resourcePeople->delete($id);
            return $this->success('Resource person deleted');
        }
        catch (\Exception $e) {
            return  $this->error();
        }

    }

}
