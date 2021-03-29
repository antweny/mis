<?php

namespace App\View\Components\Form\Elements;

class Select extends FormElement
{
    /**
     * Create a new component instance.
     */
    public function __construct($name = null, $model = null, $id = null, $required = null)
    {
        parent::__construct($name, $model, $id, $required);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.elements.select');
    }
}
