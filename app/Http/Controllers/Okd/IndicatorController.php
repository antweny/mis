<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicatorRequest;
use App\Services\IndicatorService;
use Exception;

class IndicatorController extends AuthController
{
    /**
     * @var
     */
    private $indicatorService;

    /**
     * IndicatorController constructor.
     */
    public function __construct(IndicatorService $indicatorService)
    {
        parent::__construct();
        $this->indicatorService = $indicatorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->indicatorService->model());

        try {
            $indicators = $this->indicatorService->get();  //Get all indicators
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
        $this->canCreate($this->indicatorService->model());

        try {
            $this->indicatorService->create($request->validated());
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
        $this->canUpdate($this->indicatorService->model());

        try {
            $indicator = $this->indicatorService->find($id);
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
        $this->canUpdate($this->indicatorService->model());

        try {
            $this->indicatorService->update($id,$request->validated());
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
        $this->canDelete($this->indicatorService->model());

        try {
            $this->indicatorService->delete($id);
            return $this->success('Indicator deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
