<?php

namespace App\View\Composers;

use App\Models\Event;
use Illuminate\View\View;

class EventComposer extends BaseComposer
{
    public function __construct(Event $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('events',$this->model->selectNameID());
    }

}
