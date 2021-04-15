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
//        $this->middleware('role:superAdmin')->only(['checkIn','checkOut']);
        $this->middleware('role:superAdmin')->except(['checkIn','checkOut']);
        $this->attendance = $attendance;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        try {
            $this->attendance->create($request->validated());
            return $this->success('Attendance created');
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $attendance = $this->attendance->find($id);
            return view('hra.attendances.edit',compact('attendance'));
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
        try {
            $this->attendance->update($id,$request->validated());
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
        try {
            $this->attendance->delete($id);
            return $this->success('Attendance deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
