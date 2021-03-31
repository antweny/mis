<?php

namespace App\View\Composers;

use App\Models\OrganizationCategory;
use Illuminate\View\View;

class OrganizationCategoryComposer extends  BaseComposer
{

    public function __construct(OrganizationCategory $model)
    {
        parent::__construct($model);
    }


    public function compose(View $view)
    {
        $view->with('organizationCategories', $this->model->selectNameID());
    }

}
