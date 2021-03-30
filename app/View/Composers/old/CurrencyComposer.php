<?php

namespace App\View\Composers;

use App\Repositories\CurrencyRepository;
use App\View\Composers\BaseComposer;
use Illuminate\View\View;

class CurrencyComposer extends BaseComposer
{
    public function __construct(CurrencyRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('currencies',$this->repo->selectNameAndId());
    }

}
