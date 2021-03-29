<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class IndividualGroup extends Component
{
    public $req;
    public $model;
    public $name;
    public $filter;

    /**
     * Create a new component instance.
     */
    public function __construct($req = null, $model = null,$name = 'individual_group_id',$filter = null)
    {
        $this->req = $req;
        $this->model = $model;
        $this->name = $name;
        $this->filter = $filter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.dropdown.individual-group');
    }
}
