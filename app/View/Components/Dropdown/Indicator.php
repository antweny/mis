<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class Indicator extends Component
{
    public $model;
    public $label;


    /**
     * Create a new component instance.
     */
    public function __construct($model =null,  $label = 'Indicators')
    {
        $this->model = $model;
        $this->label = $label;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.dropdown.indicator');
    }

}
