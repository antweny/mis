<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class Payment extends Component
{

    public $req;
    public $model;

    /**
     * Create a new component instance.
     */
    public function __construct($req = null, $model = null)
    {
        $this->req = $req;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dropdown.payment');
    }
}
