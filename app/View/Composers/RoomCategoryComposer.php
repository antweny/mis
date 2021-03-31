<?php

namespace App\View\Composers;

use App\Models\RoomCategory;
use Illuminate\View\View;

class RoomCategoryComposer extends BaseComposer
{
    public function __construct(RoomCategory $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('roomCategories', $this->model->selectNameID());
    }

}
