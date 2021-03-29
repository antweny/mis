<?php

namespace App\View\Components\Button;


class Delete extends Button
{

    /**
     * Delete constructor.
     */
    public function __construct($label = null, $icon = null, $class = 'btn-danger', $modal = null)
    {
        parent::__construct($label, $icon, $class, $modal);
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.button.delete');
    }
}
