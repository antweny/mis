<?php

namespace App\View\Composers;

use App\Models\Payment;
use Illuminate\View\View;

class PaymentComposer extends  BaseComposer
{
    public function __construct(Payment $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('payments',$this->model->statusCreated());
    }

}
