<?php


namespace App\View\Components\Form\Elements;

use Illuminate\View\Component;

class FormElement extends Component
{
    public $name;
    public $for;
    public $model;
    public $id;
    public $req;
    public $label;

    /**
     * Create a new component instance.
     */
//    public function __construct($name = null, $model = null, $id = null, $attri = null)
//    {
//        $this->name = $name;
//        $this->model = $model;
//        $this->id = $id;
//        $this->attri = $attri;
//    }

    public function __construct($name,$for,$model,$id,$req,$label)
    {
        $this->name = $name;
        $this->for = $for;
        $this->model = $model;
        $this->id = $id;
        $this->req = $req;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render() {}
}
