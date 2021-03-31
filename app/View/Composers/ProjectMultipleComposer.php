<?php

namespace App\View\Composers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectMultipleComposer extends BaseComposer
{

    public function __construct(Project $model)
    {
        parent::__construct($model);
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('projects', $this->model->activePluckNameID());
    }


}
