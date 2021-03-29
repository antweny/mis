<?php


namespace App\View\Components\Button;

use Illuminate\View\Component;

class Submit extends Component
{
    public $label;
    public $id;

    /**
     * Create a new component instance.
     */
    public function __construct($label = 'Submit',$id = null)
    {
        $this->label = $label;
        $this->id= $id;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.button.submit');
    }

}
