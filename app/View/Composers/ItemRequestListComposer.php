<?php

namespace App\View\Composers;

use App\Models\Item;
use Illuminate\View\View;

class ItemRequestListComposer extends BaseComposer
{
    public function __construct(Item $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('items',$this->model->quantityGreaterThanZero());
    }

}
