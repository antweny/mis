<?php

namespace App\View\Composers;

use App\Repositories\ItemRepository;
use App\View\Composers\BaseComposer;
use Illuminate\View\View;

class ItemRequestListComposer extends BaseComposer
{
    public function __construct(ItemRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('items',$this->repo->quantityNotZero());
    }

}
