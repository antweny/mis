<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class General extends Button
{

    /**
     * Create a new component instance.
     */
       public function __construct($label = null, $icon = null, $class = null, $modal = null)
       {
           parent::__construct($label, $icon, $class, $modal);
       }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.button.general');
    }
}
