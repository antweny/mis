<?php

namespace App\View\Composers;

use App\Models\OrganizationGroup;
use Illuminate\View\View;

class OrganizationGroupComposer extends BaseComposer
{
    public function __construct(OrganizationGroup $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('organizationGroups', $this->model->selectNameID());
    }

}
