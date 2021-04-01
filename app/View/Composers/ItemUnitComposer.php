<?php

namespace App\View\Composers;

use App\Models\ItemUnit;
use Illuminate\View\View;

class ItemUnitComposer extends BaseComposer
{
    public function __construct(ItemUnit $model)
    {
        parent::__construct($model);
    }


    public function compose(View $view)
    {
        $view->with('itemUnits', $this->model->selectNameID());
    }

}
