<?php

namespace App\View\Composers;

use App\Models\Brand;
use Illuminate\View\View;

class BrandComposer extends BaseComposer
{

    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('brands', $this->model->selectNameID());
    }

}
