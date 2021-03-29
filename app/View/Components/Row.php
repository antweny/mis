<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Row extends Component
{
    public $left;
    public $right;
    /**
     * Create a new component instance.
     */
    public function __construct($left = null, $right = null)
    {
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.row');
    }
}
