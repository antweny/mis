<?php

namespace App\View\Composers;

use App\Repositories\PaymentRepository;
use Illuminate\View\View;

class PaymentComposer extends  BaseComposer
{
    public function __construct(PaymentRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('payments',$this->repo->statusCreated());
    }

}
