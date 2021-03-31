<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutcomeRequest;
use App\Repository\Interfaces\OutcomeRepositoryInterface;
use Exception;

class OutcomeController extends AuthController
{
    /**
     * @var
     */
    private $interface;

    /**
     * OutcomeController constructor.
     */
    public function __construct(OutcomeRepositoryInterface $interface)
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
            $outcomes = $this->interface->get();  //Get all outcomes
            return view('outcomes.index',compact('outcomes'));
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
            $outcome = $this->interface->model();  //Get all employees
            return view('outcomes.create',compact('outcome'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OutcomeRequest $request)
    {
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
            return $this->success('Outcome created');
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
            $outcome = $this->interface->find($id);
            return view('outcomes.edit',compact('outcome'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OutcomeRequest $request, $id)
    {
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->updating($id,$request->validated());
            return $this->successRoute('outcomes.index','Outcome updated');
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
            return $this->success('Outcome deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
