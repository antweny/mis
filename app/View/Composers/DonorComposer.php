<?php

namespace App\View\Composers;

use App\Models\Stakeholder;
use Illuminate\View\View;

class DonorComposer extends BaseComposer
{
    public function __construct(Stakeholder $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('donors',$this->model->getStakeholderByGroup('Donor'));
    }

}
