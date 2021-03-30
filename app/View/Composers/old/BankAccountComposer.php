<?php

namespace App\View\Composers;

use App\Repositories\BankAccountRepository;
use Illuminate\View\View;

class BankAccountComposer extends BaseComposer
{
    public function __construct(BankAccountRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('bankAccounts',$this->repo->bankNumberCurrency());
    }
}
