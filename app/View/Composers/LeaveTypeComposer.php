<?php

namespace App\View\Composers;

use App\Models\LeaveType;
use Illuminate\View\View;

class LeaveTypeComposer extends BaseComposer
{
    public function __construct(LeaveType $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('leaveTypes', $this->model->selectNameID());
    }

}
