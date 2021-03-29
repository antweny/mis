<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public $name;
    public $model;
    public $id;
    public $req;
    public $class;
    public $label;
    public $for;


    /**
     * Create a new component instance.
     */
    public function __construct($name = null, $model = null, $id = null, $req = null, $class = null, $label = null,$for = null)
    {
        $this->name = $name;
        $this->model = $model;
        $this->id = $id;
        $this->req = $req;
        $this->class = $class;
        $this->label = $label;
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.dropdown');
    }
}
