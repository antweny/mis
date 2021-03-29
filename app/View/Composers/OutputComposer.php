<?php

namespace App\View\Composers;

use App\Repositories\OutputRepository;
use Illuminate\View\View;

class OutputComposer extends BaseComposer
{
    public function __construct(OutputRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('outputs',$this->repo->getCurrentYearOutput());
    }

}
