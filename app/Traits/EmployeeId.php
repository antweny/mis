<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;


trait EmployeeId
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            if (!is_null(auth()->user()->employee)) {
                if (!isset(auth()->user()->employee->id)) {
                    return null;
                }
            $model->employee_id = auth()->user()->employee->id;
            }
        });
    }


}
