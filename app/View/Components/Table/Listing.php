<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Listing extends Component
{
    public $class;
    public $id;
    public $thead;
    /**
     * Create a new component instance.
     */
    public function __construct($class = null, $id = 'table',$thead =null)
    {
        $this->class = $class;
        $this->id = $id;
        $this->thead = $thead;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.table.listing');
    }
}
