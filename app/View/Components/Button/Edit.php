<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Edit extends Button
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.button.edit');
    }
}
