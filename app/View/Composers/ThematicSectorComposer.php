<?php

namespace App\View\Composers;

use App\Models\ThematicArea;
use Illuminate\View\View;

class ThematicSectorComposer extends BaseComposer
{
    public function __construct(ThematicArea $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('thematicSectors', $this->model->parentOnly());
    }



}
