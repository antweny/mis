<?php

namespace App\View\Composers;

use App\Models\Location;
use Illuminate\View\View;

class LocationComposer
{
    protected $model;

    public function __construct(Location $model)
    {
        $this->model = $model;
    }

    public function compose(View $view)
    {
        $view->with('locations',$this->model->selectNameID());
    }

}
