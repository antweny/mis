<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;

class Role extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.auth.role');
    }
}
