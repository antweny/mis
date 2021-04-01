<?php

namespace App\View\Composers;

use App\Models\Stakeholder;
use Illuminate\View\View;

class BankComposer extends BaseComposer
{
    public function __construct(Stakeholder $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('banks',$this->model->getStakeholderByGroup('Bank'));
    }

}
