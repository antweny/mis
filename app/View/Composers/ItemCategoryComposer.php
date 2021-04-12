<?php

namespace App\View\Composers;

use App\Models\ItemCategory;
use Illuminate\View\View;

class ItemCategoryComposer extends BaseComposer
{
    public function __construct(ItemCategory $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('itemCategories', $this->model->selectNameID());
    }

}

