<?php

namespace App\View\Composers;

use App\Repositories\PayeeRepository;

use Illuminate\View\View;

class PayeeComposer extends BaseComposer
{
    public function __construct(PayeeRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('payees',$this->repo->selectNameAndId());
    }

}
