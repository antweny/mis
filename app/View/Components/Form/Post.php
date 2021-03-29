<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Post extends Component
{
    public $action;
    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct($action, $class = null)
    {
        $this->action = $action;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.post');
    }
}
