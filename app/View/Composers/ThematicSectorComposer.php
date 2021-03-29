<?php

namespace App\View\Composers;

use App\Repositories\ThematicAreaRepository;
use Illuminate\View\View;

class ThematicSectorComposer extends BaseComposer
{
    public function __construct(ThematicAreaRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('thematicSectors', $this->repo->parentOnly());
    }



}
