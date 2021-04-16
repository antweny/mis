<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Repository\Interfaces\AttendanceRepositoryInterface;
use Exception;

class AttendanceController extends AuthController
{
    /**
     * @var
     */
    private $attendance;

    /**
     * AttendanceController constructor.
     */
    public function __construct(AttendanceRepositoryInterface $attendance)
    {
        parent::__construct();
        $this->middleware('superAdmin')->only('index','delete','store','edit','update','delete');
        $this->middleware('employee')->only('checkIn','checkOut');
        $this->attendance = $attendance;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->attendance->model());

        try {
            $attendances = $this->attendance->get();  //Get all attendances
            return view('hra.attendance.index',compact('attendances'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendanceRequest $request)
    {
        $this->canView($this->attendance->model());

        try {
            $this->attendance->create($request->validated());
            return $this->success('Attendance created');
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
        $this->canView($this->attendance->model());

        try {
            $attendance = $this->attendance->find($id);
            return view('hra.attendance.edit',compact('attendance'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttendanceRequest $request, $id)
    {
        $this->canView($this->attendance->model());

        try {
            $this->attendance->updating($id,$request->validated());
            return $this->successRoute('attendances.index','Attendance updated');
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
        $this->canView($this->attendance->model());

        try {
            $this->attendance->delete($id);
            return $this->success('Attendance deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function checkIn()
    {
        try {
            $this->attendance->checkIn($this->userEmployeeId());
            return back()->withSuccess('Welcome Back!');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function checkOut()
    {
        try {
            $attendance = $this->attendance->checkOut($this->userEmployeeId());
            return back()->withSuccess('You have checked out, total time of working is '.$attendance->total_hours);
        }
        catch (Exception $e) {
            return $this->error();
        }

    }
}
