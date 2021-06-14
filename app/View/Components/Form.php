<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $method;
    public $action;

    /*  Create a new component instance. */
    public function __construct($action = null, $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
    }

    /* Get the view / contents that represent the component. */
    public function render()
    {
        return view('components.form');
    }
}
