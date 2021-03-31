<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimesheetRequest;
use App\Repository\Interfaces\TimesheetRepositoryInterface;
use App\Services\TimesheetService;
use Exception;

class TimesheetController extends AuthController
{
    /**
     * @var
     */
    private $timesheetService;

    /**
     * TimesheetController constructor.
     */
    public function __construct(TimesheetRepositoryInterface $timesheetService)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->timesheetService = $timesheetService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $timesheets = $this->timesheetService->groupByDate($this->userEmployeeId());  //Get all timesheets
            return view('timesheets.index',compact('timesheets'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimesheetRequest $request)
    {
        try {
            $this->timesheetService->create($request->validated());
            return $this->success('Timesheet created');
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
        try {
            $timesheet = $this->timesheetService->find($id);
            return view('timesheets.edit',compact('timesheet'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimesheetRequest $request, $id)
    {
        try {
            $this->timesheetService->update($id,$request->validated());
            return $this->successRoute('timesheets.index','Timesheet updated');
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
        try {
            $this->timesheetService->delete($id);
            return $this->success('Timesheet deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
