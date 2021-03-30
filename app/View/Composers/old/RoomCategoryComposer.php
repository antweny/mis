<?php

namespace App\View\Composers;

use App\Repositories\RoomCategoryRepository;
use Illuminate\View\View;

class RoomCategoryComposer extends BaseComposer
{
    public function __construct(RoomCategoryRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('roomCategories', $this->repo->selectNameAndId());
    }

}
