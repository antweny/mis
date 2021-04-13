<?php

namespace App\View\Composers;

use App\Models\Item;
use Illuminate\View\View;

class ItemComposer extends BaseComposer
{
    public function __construct(Item $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('items',$this->model->selectNameID());
    }

}
