<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $class;
    public $title;
    public $footer;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $class = null, $title =null, $footer = null)
    {
        $this->id = $id;
        $this->class = $class;
        $this->title = $title;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.modal');
    }
}
