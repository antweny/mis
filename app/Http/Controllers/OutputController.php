<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutputRequest;
use App\Services\OutputService;
use Exception;

class OutputController extends AuthController
{
    /**
     * @var
     */
    private $outputService;

    /**
     * OutputController constructor.
     */
    public function __construct(OutputService $outputService)
    {
        parent::__construct();
        $this->outputService = $outputService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->outputService->model());

        try {
            $outputs = $this->outputService->withRelation();  //Get all outputs
            return view('outputs.index',compact('outputs'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $this->canCreate($this->outputService->model());

        try {
            $output = $this->outputService->model();  //Get all employees
            return view('outputs.create',compact('output'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OutputRequest $request)
    {
        $this->canCreate($this->outputService->model());

        try {
            $this->outputService->create($request->validated());
            return $this->success('Output created');
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
        $this->canUpdate($this->outputService->model());

        try {
            $output = $this->outputService->find($id);
            return view('outputs.edit',compact('output'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OutputRequest $request, $id)
    {
        $this->canUpdate($this->outputService->model());

        try {
            $this->outputService->update($id,$request->validated());
            return $this->successRoute('outputs.index','Output updated');
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
        $this->canDelete($this->outputService->model());

        try {
            $this->outputService->delete($id);
            return $this->success('Output deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
