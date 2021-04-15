<?php

namespace App\Repository;

use App\Models\Attendance;
use App\Repository\Interfaces\AttendanceRepositoryInterface;
use Exception;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{

    public function __construct(Attendance $model)
    {
        parent::__construct($model);
    }

    /*
     * Get all user attendance
     */
    public function get()
    {
       return $this->relationshipWith(['employee']);
    }

    /*
     * Create New Attendance
     */
    public function create($request)
    {
        try {
            $request['total_hours'] = $this->calculateTotalHours($request['time_in'],$request['time_out']);
            $this->model->create($request);
            return true;
        }
        catch(Exception $e) {
            throw $e;
        }
    }

    /*
     * Calculate total hours
     */
    private function calculateTotalHours($time1,$time2)
    {
        return totalHours($time1,$time2);
    }


    public function checkIn()
    {
        // TODO: Implement singIn() method.
    }

    public function checkOut()
    {
        // TODO: Implement signOut() method.
    }
}
