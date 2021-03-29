<?php

namespace App\View\Components\Button;


class Back extends Button
{

    public function __construct($label = null, $icon = null, $class = 'btn-dark', $modal = null)
    {
        parent::__construct($label, $icon, $class, $modal);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.button.back');
    }
}
