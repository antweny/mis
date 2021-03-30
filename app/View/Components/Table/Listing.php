<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Listing extends Component
{
    public $id;
    public $thead;
    public $collection;
    /**
     * Create a new component instance.
     */
    public function __construct($id = null,$thead =null, $collection = null)
    {
        $this->id = $id;
        $this->thead = $thead;
        $this->collection= $collection;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.table.listing');
    }
}
