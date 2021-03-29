<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class Organization extends Component
{
    public $req;
    public $model;
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct($req = null, $model = null,$name = 'organization_id')
    {
        $this->req = $req;
        $this->model = $model;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.dropdown.organization');
    }
}
