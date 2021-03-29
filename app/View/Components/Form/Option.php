<?php

namespace App\View\Components\Form\Elements;

use Illuminate\View\Component;

class Option extends Component
{
    public $name;
    public $model;
    public $optName;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($name = null,$model = null, $optName = null, $value = null)
    {
        $this->name=$name;
        $this->model=$model;
        $this->optName=$optName;
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.elements.option');
    }



}
