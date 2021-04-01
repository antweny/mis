<?php

namespace App\View\Composers;

use App\Models\Equipment;
use Illuminate\View\View;

class EquipmentComposer extends BaseComposer
{
    public function __construct(Equipment $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('equipments', $this->model->selectBrandModelID());
    }

}
