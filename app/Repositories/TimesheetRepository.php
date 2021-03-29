<?php

namespace App\Repositories;

use App\Interfaces\TimesheetInterface;
use App\Models\Timesheet;

class TimesheetRepository extends BaseRepository implements TimesheetInterface
{
    public function __construct(Timesheet $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all user timesheet records
     */
    public function getUserTimesheet($id)
    {
        return $this->model->where('employee_id',$id)->with('activity')->get();
    }

    /**
     * Group all user timesheets record by date
     */
    public function groupUserTimesheetByDate($id)
    {
        return $this->model->where('employee_id',$id)->with('activity')->orderBy('date','desc')->get()->groupBy('date');
    }





}
