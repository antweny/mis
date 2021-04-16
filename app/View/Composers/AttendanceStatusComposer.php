<?php

namespace App\View\Composers;

use App\Models\Attendance;
use Illuminate\View\View;

class AttendanceStatusComposer extends BaseComposer
{
    public function __construct(Attendance $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('attendance', $this->attendanceStatus());
    }


    /*
     *
     */
    private function attendanceStatus()
    {
        if (!is_null(auth()->user()->employee)) {
           return $this->model->where('employee_id',auth()->user()->employee->id)
                ->where('date',date('Y-m-d'))
                ->where('time_out',null)
                ->count();
        }
        return null;
    }


}
