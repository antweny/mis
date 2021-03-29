<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class ItemCategory extends Component
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
     */
    public function render()
    {
        return view('components.dropdown.item-category');
    }
}
