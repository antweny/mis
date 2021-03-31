<?php

namespace App\Repository;

use App\Models\Timesheet;
use App\Repository\Interfaces\TimesheetRepositoryInterface;

class TimesheetRepository extends BaseRepository implements TimesheetRepositoryInterface
{

    public function __construct(Timesheet $model)
    {
        parent::__construct($model);
    }

    /**
     * Group timesheet daily
     */
    public function groupByDate($id)
    {
        return $this->model->where('employee_id',$id)->with('activity')->orderBy('date','desc')->get()->groupBy('date');
    }
}
