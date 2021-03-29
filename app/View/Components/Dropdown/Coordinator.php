<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class Coordinator extends Component
{
    public $name;
    public $model;
    public $req;
    /**
     * Create a new component instance.
     */
    public function __construct($name = 'coordinators[]',$model =null, $req = null)
    {
        $this->name = $name;
        $this->model = $model;
        $this->req = $req;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.dropdown.coordinator');
    }
}
