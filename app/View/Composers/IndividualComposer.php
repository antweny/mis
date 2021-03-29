<?php

namespace App\View\Composers;

use App\Repositories\IndividualRepository;
use Illuminate\View\View;

class IndividualComposer extends BaseComposer
{
    public function __construct(IndividualRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('individuals',$this->repo->select());
    }

}
