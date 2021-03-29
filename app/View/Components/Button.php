<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $class;
    public $id;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $type="submit", $id = null, $label = 'Submit' ,$class = 'btn-primary')
    {
        $this->id = $id;
        $this->label = $label;
        $this->class = $class;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
