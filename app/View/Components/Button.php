<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $label;
    public $id;
    public $class;

    /* Create a new component instance. */
    public function __construct($label = 'submit', $id = null, $class = null)
    {
        $this->label = $label;
        $this->id= $id;
        $this->class= $class;

    }

    /* Get the view / contents that represent the component. */
    public function render()
    {
        return view('components.button');
    }
}
