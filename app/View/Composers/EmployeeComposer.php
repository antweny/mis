<?php

namespace App\View\Composers;

use App\Models\Employee;
use Illuminate\View\View;

class EmployeeComposer extends BaseComposer
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('employees',$this->model->isActive());
    }

}
