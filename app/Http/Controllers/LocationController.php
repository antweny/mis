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
    private $interface;

    /**
     * LocationController constructor.
     */
    public function __construct(LocationRepositoryInterface $interface)
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
            $locations = $this->interface->get();
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
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
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
        $this->canUpdate($this->interface->model());

        try {
            $location = $this->interface->find($id);
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
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->validated());
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
        $this->canDelete($this->interface->model());

        try {
            $this->interface->delete($id);
            return $this->success('Location deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

}
