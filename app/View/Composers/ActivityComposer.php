<?php

namespace App\View\Composers;

use App\Models\Activity;
use Illuminate\View\View;

class ActivityComposer extends BaseComposer
{
    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('activities',$this->model->currentYearActivity());
    }

}
