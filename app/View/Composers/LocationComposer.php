<?php

namespace App\View\Composers;

use App\Repositories\LocationRepository;
use Illuminate\View\View;

class LocationComposer extends BaseComposer
{

    public function __construct(LocationRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('locations',$this->repo->selectNameAndId());
    }

}
