<?php

namespace App\View\Composers;

use App\Repositories\EventRepository;
use Illuminate\View\View;

class EventComposer extends BaseComposer
{
    public function __construct(EventRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('events',$this->repo->selectNameAndId());
    }

}
