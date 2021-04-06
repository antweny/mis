<?php

namespace App\View\Composers;

use App\Models\JobTitle;
use Illuminate\View\View;

class JobTitleComposer extends BaseComposer
{
    public function __construct(JobTitle $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('jobTitles',$this->model->selectNameID());
    }

}
