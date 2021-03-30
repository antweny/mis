<?php

namespace App\View\Composers;

use App\Models\Designation;
use Illuminate\View\View;

class DesignationComposer extends BaseComposer
{
    public function __construct(Designation $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('designations',$this->model->selectNameID());
    }

}
