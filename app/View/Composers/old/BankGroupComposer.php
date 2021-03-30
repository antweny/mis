<?php

namespace App\View\Composers;

use App\Repositories\BankRepository;
use App\View\Composers\BaseComposer;
use Illuminate\View\View;

class BankGroupComposer extends BaseComposer
{
    public function __construct(BankRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('banks', $this->repo->bankGroup());
    }

}
