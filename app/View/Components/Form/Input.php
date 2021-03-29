<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $id;
    public $model;
    public $req;

    /**
     * Create a new component instance.
     */
    public function __construct($name = '', $model = null, $id = '', $req = '', $type = 'text')
    {
        $this->name = $name;
        $this->model = $model;
        $this->id = $id;
        $this->req = $req;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.input');
    }

}
