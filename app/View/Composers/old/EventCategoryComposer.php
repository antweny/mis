<?php

namespace App\View\Composers;

use App\Repositories\EventCategoryRepository;
use Illuminate\View\View;

class EventCategoryComposer extends BaseComposer
{
    public function __construct(EventCategoryRepository $repo)
    {
        parent::__construct($repo);
    }


    public function compose(View $view)
    {
        $view->with('eventCategories', $this->repo->orderBySortAsc());
    }

}
