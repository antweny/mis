<?php

namespace App\View\Composers;

use App\Models\IndividualGroup;
use Illuminate\View\View;

class IndividualGroupComposer extends BaseComposer
{

    public function __construct(IndividualGroup $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('individualGroups', $this->model->selectNameID());
    }



}
