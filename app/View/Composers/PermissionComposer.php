<?php

namespace App\View\Composers;

use App\Models\Permission;
use Illuminate\View\View;

class PermissionComposer
{
    /**
     * @var Permission
     */
    private $model;

    /**
     * Permission Composer constructor.
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('permissions', $this->model->selectNameID());
    }


}
