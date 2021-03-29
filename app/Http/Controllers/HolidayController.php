<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayRequest;
use App\Services\HolidayService;
use Exception;

class HolidayController extends AuthController
{
    private $holidayService;

    /**
     * PublicHolidayController constructor.
     */
    public function __construct(HolidayService $holidayService)
    {
        parent::__construct();
        $this->holidayService = $holidayService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->holidayService->model());

        try {
            $holidays = $this->holidayService->get();  //Get all holidays
            return view('holidays.index',compact('holidays'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HolidayRequest $request)
    {
        $this->canCreate($this->holidayService->model());

        try {
            $this->holidayService->create($request->validated());  //Get all holidays
            return $this->success('Holiday Created created');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request,'Error: Holiday with the same name is already active');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->holidayService->model());

        try {
            $holiday = $this->holidayService->find($id);
            return view('holidays.edit',compact('holiday'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HolidayRequest $request, $id)
    {
        $this->canUpdate($this->holidayService->model());

        try {
            $this->holidayService->update($id,$request->validated());
            return $this->successRoute('holidays.index','Holiday updated');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request,'Error: Holiday with the same name is already active');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->holidayService->model());

        try {
            $this->holidayService->delete($id);
            return $this->success('Holiday deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
