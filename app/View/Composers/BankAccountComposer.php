<?php

namespace App\View\Composers;

use App\Models\BankAccount;
use Illuminate\View\View;

class BankAccountComposer extends BaseComposer
{
    public function __construct(BankAccount $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('bankAccounts',$this->model->accountNumber());
    }
}
