<?php

namespace App\Http\Controllers;

use App\Http\Requests\StakeholderRequest;
use App\Repository\Interfaces\StakeholderRepositoryInterface;
use App\Services\StakeholderService;
use Exception;

class StakeholderController extends AuthController
{
    /**
     * @var
     */
    protected $stakeholder;

    /**
     * Stakeholder Controller constructor.
     */
    public function __construct(StakeholderRepositoryInterface $stakeholder)
    {
        parent::__construct();
        $this->stakeholder = $stakeholder;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->stakeholder->model());

        try {
            $stakeholders = $this->stakeholder->get();  //Get all titles
            return view('organization-stakeholders.index',compact('stakeholders'));
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
        $this->canCreate($this->stakeholder->model());

        try {
            $this->stakeholder->create($request->validated());
            return $this->success('Stakeholder created');
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
        $this->canUpdate($this->stakeholder->model());

        try {
            $stakeholder = $this->stakeholder->find($id);
            return view('organization-stakeholders.edit',compact('stakeholder'));
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
        $this->canUpdate($this->stakeholder->model());

        try {
            $this->stakeholder->update($id,$request->validated());
            return $this->successRoute('stakeholders.index','Stakeholder updated');
        }
        catch (\Exception $e) {
            dd($e->getMessage());
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->stakeholder->model());

        try {
            $this->stakeholder->delete($id);
            return $this->success('Stakeholder deleted');
        }
        catch (\Exception $e) {
            return $this->error('You can not delete this now');
        }
    }
}
