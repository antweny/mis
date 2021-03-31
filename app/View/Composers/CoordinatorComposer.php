<?php

namespace App\View\Composers;

use App\Models\Employee;
use Illuminate\View\View;

class CoordinatorComposer extends BaseComposer
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('coordinators',$this->model->getActiveNameID());
    }

}
