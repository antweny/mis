<?php

namespace App\View\Composers;

use App\Models\Indicator;
use Illuminate\View\View;

class IndicatorComposer extends BaseComposer
{
    public function __construct(Indicator $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('indicators',$this->model->pluckNameID());
    }

}
