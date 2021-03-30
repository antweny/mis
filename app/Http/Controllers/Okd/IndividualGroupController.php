<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndividualGroupRequest;
use App\Services\IndividualGroupService;
use Exception;

class IndividualGroupController extends AuthController
{
    /**
     * @var
     */
    protected $individualGroup;

    /**
     * Individual Group Controller constructor.
     */
    public function __construct(IndividualGroupService $individualGroup)
    {
        parent::__construct();
        $this->individualGroup = $individualGroup;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->individualGroup->model());

        try {
            $individualGroups = $this->individualGroup->get();  //Get all titles
            return view('individual-groups.index',compact('individualGroups'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndividualGroupRequest $request)
    {
        $this->canCreate($this->individualGroup->model());

        try {
            $this->individualGroup->create($request->validated());
            return $this->success('Individual Group created');
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
        $this->canUpdate($this->individualGroup->model());

        $individualGroup = $this->individualGroup->find($id);
        if (!is_null($individualGroup)){
            return view('individual-groups.edit',compact('individualGroup'));
        }
        else {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndividualGroupRequest $request, $id)
    {
        $this->canUpdate($this->individualGroup->model());

        try {
            $this->individualGroup->update($id,$request->validated());
            return $this->successRoute('individualGroups.index','Individual Group updated');
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
        $this->canDelete($this->individualGroup->model());

        try {
            $this->individualGroup->delete($id);
            return $this->success('Individual Group deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
