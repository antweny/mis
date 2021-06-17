<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Repository\Interfaces\LocationRepositoryInterface;
use Exception;

class LocationController extends AuthController
{
    /**
     * @var
     */
    private $location;

    /**
     * LocationController constructor.
     */
    public function __construct(LocationRepositoryInterface $location)
    {
        parent::__construct();
        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->location->model());

        try {
            $locations = $this->location->get();
            return view('location.index',compact('locations'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        $this->canCreate($this->location->model());

        try {
            $this->location->create($request->validated());
            return $this->success('Location created');
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
        $this->canUpdate($this->location->model());

        try {
            $location = $this->location->find($id);
            return view('location.edit', compact('location'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request,$id)
    {
        $this->canUpdate($this->location->model());

        try {
            $this->location->update($id,$request->validated());
            return $this->successRoute('locations.index','Location updated');
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
        $this->canDelete($this->location->model());

        try {
            $this->location->delete($id);
            return $this->success('Location deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

}
