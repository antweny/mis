<?php

namespace App\View\Composers;

use App\Models\JobType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

class JobTypeComposer extends BaseComposer
{
    /*
     * Job Type Composer constructor.
     * @param JobType $model
     */
    public function __construct(JobType $model)
    {
        parent::__construct($model);
    }


    public function compose(View $view)
    {
        $view->with('jobTypes', $this->model->selectNameID());
    }

}
