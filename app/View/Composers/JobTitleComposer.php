<?php

namespace App\View\Composers;

use App\Repositories\JobTitleRepository;
use Illuminate\View\View;

class JobTitleComposer extends BaseComposer
{
    public function __construct(JobTitleRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('jobTitles',$this->repo->selectNameAndId());
    }

}
