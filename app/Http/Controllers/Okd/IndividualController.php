<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\IndividualRequest;
use App\Services\IndividualService;
use Exception;


class IndividualController extends AuthController
{
    /**
     * @var
     */
    protected $individual;
    /**
     * IndividualController constructor.
     */
    public function __construct(IndividualService $individualService)
    {
        parent::__construct();
        $this->individual = $individualService;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->individual->model());

        try {
            $individuals = $this->individual->engagement();  //Get all individual
            return view('individual.index',compact('individuals'));
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
        $this->canCreate($this->individual->model());

        try {
            $individual = $this->individual->model();
            return view('individual.create',compact('individual'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndividualRequest $request)
    {
        $this->canCreate($this->individual->model());

        try {
            $this->individual->create($request->except('_token'));
            return $this->success('Individual created');
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
        $this->canUpdate($this->individual->model());

        $individual = $this->individual->find($id);
        if (!is_null($individual)){
            return view('individual.edit',compact('individual'));
        }
        else {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndividualRequest $request,$id)
    {
        $this->canUpdate($this->individual->model());

        $individual = $this->individual->update($id,$request->except('_token'));
        if($individual) {
            return $this->successRoute('individual.index','Individual updated!');
        }
        else {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->individual->model());

        try {
            $this->individual->delete($id);
            return $this->success('Individual deleted!');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }

    /**
     * Import Batch of file.
     */
    public function import(ImportFileRequest $request)
    {
        try {
            $this->individual->import($request);
            return back()->with('success','Import in Queue, we will send notification after import finished');
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Import Batch of file.
     */
    public function export($val = 'xlsx')
    {
        try {
            $this->individual->export($val);
            return $this->success('Individual exported successfully!');
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
