<?php

namespace App\View\Composers;

use App\Repositories\IndicatorRepository;
use Illuminate\View\View;

class IndicatorComposer extends BaseComposer
{
    public function __construct(IndicatorRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('indicators',$this->repo->pluckNameId());
    }

}
