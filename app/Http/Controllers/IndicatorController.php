<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicatorRequest;
use App\Repository\Interfaces\IndicatorRepositoryInterface;
use Exception;

class IndicatorController extends AuthController
{
    /**
     * @var
     */
    private $interface;

    /**
     * IndicatorController constructor.
     */
    public function __construct(IndicatorRepositoryInterface $interface)
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
            $indicators = $this->interface->get();  //Get all indicators
            return view('indicators.index',compact('indicators'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndicatorRequest $request)
    {
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
            return $this->success('Indicator created');
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
            $indicator = $this->interface->find($id);
            return view('indicators.edit',compact('indicator'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndicatorRequest $request, $id)
    {
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->validated());
            return $this->successRoute('indicators.index','Indicator updated');
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
            return $this->success('Indicator deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
