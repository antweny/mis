<?php

namespace App\View\Composers;

use App\Models\GenderSeries;
use Illuminate\View\View;

class GenderSeriesComposer extends BaseComposer
{
    public function __construct(GenderSeries $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('genders', $this->model->genderList());
    }

}
