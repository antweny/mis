<?php

namespace App\View\Composers;

use App\Repositories\ActivityRepository;
use Illuminate\View\View;

class ActivityComposer extends BaseComposer
{
    public function __construct(ActivityRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('activities',$this->repo->activityComposer());
    }

}
