<?php

namespace App\View\Components\Form\Elements;

class Input extends FormElement
{
    public $type;

    /**
     * Create a new component instance.
     */
    public function __construct($name = '',$for = '', $model = null, $id = '', $req = null,$label = null,$type = 'text')
    {
        parent::__construct($name,$for,$model, $id, $req,$label);
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.elements.input');
    }

}
