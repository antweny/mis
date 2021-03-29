<?php

namespace App\View\Composers;


use App\Repositories\ItemUnitRepository;
use Illuminate\View\View;

class ItemUnitComposer extends BaseComposer
{
    public function __construct(ItemUnitRepository $repo)
    {
        parent::__construct($repo);
    }


    public function compose(View $view)
    {
        $view->with('itemUnits', $this->repo->selectNameAndId());
    }

}
