<?php

namespace App\View\Composers;

use App\Models\EventCategory;
use Illuminate\View\View;

class EventCategoryComposer extends BaseComposer
{
    public function __construct(EventCategory $model)
    {
        parent::__construct($model);
    }


    public function compose(View $view)
    {
        $view->with('eventCategories', $this->model->orderBySortAsc());
    }

}
