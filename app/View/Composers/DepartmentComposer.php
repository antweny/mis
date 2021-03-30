<?php

namespace App\View\Composers;

use App\Models\Department;
use Illuminate\View\View;

class DepartmentComposer extends BaseComposer
{

    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('departments',$this->model->selectNameID());
    }


}
