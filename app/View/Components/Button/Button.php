<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Button extends Component
{
    public $class;
    public $label;
    public $icon;
    public $modal;

    /**
     * Create a new component instance.
     */
    public function __construct($label = null, $icon = null, $class = null,$modal = null)
    {
        $this->label = $label;
        $this->icon = $icon;
        $this->class = $class;
        $this->modal = $modal;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button.button');
    }
}
