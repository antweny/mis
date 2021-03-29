<?php

namespace App\View\Composers;

use App\Repositories\OutcomeRepository;
use Illuminate\View\View;

class OutcomeComposer extends BaseComposer
{
    public function __construct(OutcomeRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('outcomes',$this->repo->getCurrentYearOutcome());
    }

}
