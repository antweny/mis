<?php

namespace App\View\Composers;

use App\Models\Payee;
use Illuminate\View\View;

class PayeeComposer extends BaseComposer
{
    public function __construct(Payee $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('payees',$this->model->selectNameID());
    }

}
