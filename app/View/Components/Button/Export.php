<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Export extends Component
{
    public $route;

    /**
     * Create a new component instance.
     */
    public function __construct($route = null)
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.export');
    }
}
