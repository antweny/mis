<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $row;
    public $name;
    public $id;
    public $model;
    public $req;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $model = null, $id = '', $req = '', $row = 3)
    {
        $this->name = $name;
        $this->model = $model;
        $this->id = $id;
        $this->req = $req;
        $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.textarea');
    }
}
