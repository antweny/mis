<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutputRequest;
use App\Repository\Interfaces\OutputRepositoryInterface;
use Exception;

class OutputController extends AuthController
{
    /**
     * @var
     */
    private $interface;

    /**
     * OutputController constructor.
     */
    public function __construct(OutputRepositoryInterface $interface)
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
            $outputs = $this->interface->groupByOutcome();  //Get all outputs
            return view('op.outputs.index',compact('outputs'));
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
        $this->canCreate($this->interface->model());

        try {
            $output = $this->interface->model();  //Get all employees
            return view('op.outputs.create',compact('output'));
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
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
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
        $this->canUpdate($this->interface->model());

        try {
            $output = $this->interface->find($id);
            return view('op.outputs.edit',compact('output'));
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
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->validated());
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
        $this->canDelete($this->interface->model());

        try {
            $this->interface->delete($id);
            return $this->success('Output deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
