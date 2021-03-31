<?php

namespace App\View\Composers;

use App\Models\Output;
use Illuminate\View\View;

class OutputComposer extends BaseComposer
{
    public function __construct(Output $model)
    {
        parent::__construct($model);
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('outputs',$this->model->currentYearNameDescList());
    }

}
