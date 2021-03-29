<?php

namespace App\View\Composers;

use App\Repositories\GenderSeriesRepository;
use Illuminate\View\View;

class GenderSeriesComposer extends BaseComposer
{
    public function __construct(GenderSeriesRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('genders', $this->repo->dropdownList());
    }

}
