<?php

namespace App\View\Composers;

use App\Models\Role;
use Illuminate\View\View;

class RoleComposer
{
    /**
     * @var Role
     */
    private $model;

    /**
     * Permission Composer constructor.
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('roles', $this->model->selectNameID());
    }


}
