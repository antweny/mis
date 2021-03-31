<?php

namespace App\View\Composers;

use App\Models\Outcome;
use Illuminate\View\View;

class OutcomeComposer extends BaseComposer
{
    public function __construct(Outcome $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('outcomes',$this->model->currentYearNameDescList());
    }

}
