<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Http\Requests\StakeholderRequest;
use App\Services\DonorService;
use Exception;

class DonorController extends AuthController
{
    /**
     * @var
     */
    protected $donor;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(DonorService $donor)
    {
        parent::__construct();
        $this->donor = $donor;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->donor->model());

        try {
            $donors = $this->donor->get();  //Get all titles
            return view('donors.index',compact('donors'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StakeholderRequest $request)
    {
        $this->canCreate($this->donor->model());

        try {
            $this->donor->create($request->validated());
            return $this->success('Donor created');
        }
        catch (\Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->donor->model());

        try {
            $donor = $this->donor->find($id);
            return view('donors.edit',compact('donor'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StakeholderRequest $request, $id)
    {
        $this->canUpdate($this->donor->model());

        try {
            $this->donor->update($id,$request->validated());
            return $this->successRoute('donors.index','Donor updated');
        }
        catch (\Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->donor->model());

        try {
            $this->donor->delete($id);
            return $this->success('Donor deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
