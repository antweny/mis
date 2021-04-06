<?php

namespace App\View\Composers;

use App\Models\Individual;
use Illuminate\View\View;

class IndividualComposer extends BaseComposer
{
    public function __construct(Individual $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('individuals',$this->model->selectNameIDMobile());
    }

}
