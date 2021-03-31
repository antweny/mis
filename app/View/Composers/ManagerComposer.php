<?php

namespace App\View\Composers;

use App\Models\Employee;
use Illuminate\View\View;

class ManagerComposer extends BaseComposer
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('managers',$this->model->isActive());
    }

}
