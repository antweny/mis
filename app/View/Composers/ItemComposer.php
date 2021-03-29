<?php

namespace App\View\Composers;

use App\Repositories\ItemRepository;
use Illuminate\View\View;

class ItemComposer extends BaseComposer
{
    public function __construct(ItemRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('items',$this->repo->selectNameAndId());
    }

}
