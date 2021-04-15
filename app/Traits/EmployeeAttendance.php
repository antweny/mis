<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait EmployeeAttendance
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            if (!is_null(auth()->user()->employee)) {
                $model->employee_id = auth()->user()->employee->id;
            }
            $model->present = true;
        });
    }
}
