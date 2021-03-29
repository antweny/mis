<?php

namespace App\View\Composers;

use App\Repositories\LeaveTypeRepository;
use Illuminate\View\View;

class LeaveTypeComposer extends BaseComposer
{
    public function __construct(LeaveTypeRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('leaveTypes', $this->repo->selectNameAndId());
    }

}
