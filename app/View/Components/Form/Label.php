<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Label extends Component
{
    public $for;
    public $name;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $for = null)
    {
        $this->name = $name;
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.label');
    }
}
