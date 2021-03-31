<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class ProjectMultiple extends Component
{
    public $model;

    /**
     * Create a new component instance.
     */
    public function __construct($model =null)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown.project-multiple');
    }
}
