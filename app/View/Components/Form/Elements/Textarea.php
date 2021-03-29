<?php

namespace App\View\Components\Form\Elements;


class Textarea extends FormElement
{
    public $row;
    /**
     * Create a new component instance.
     */
    public function __construct($name = '', $for = '', $model = null, $id = '', $req = '', $label = '',$row = '')
    {
        parent::__construct($name, $for, $model, $id, $req, $label);
        $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.elements.textarea');
    }
}
