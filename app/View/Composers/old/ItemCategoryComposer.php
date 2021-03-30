<?php

namespace App\View\Composers;

use App\Repositories\ItemCategoryRepository;
use Illuminate\View\View;

class ItemCategoryComposer extends BaseComposer
{
    public function __construct(ItemCategoryRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('itemCategories', $this->repo->orderBySortAsc());
    }

}

