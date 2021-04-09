<?php

namespace App\View\Composers;

use App\Models\Organization;
use Illuminate\View\View;

class OrganiserComposer extends BaseComposer
{
    public function __construct(Organization $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('organizations', $this->model->pluckNameID());
    }

}
