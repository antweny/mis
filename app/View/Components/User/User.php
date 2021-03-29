<?php

namespace App\View\Components\User;

use App\View\Components\Dropdown;

class User extends Dropdown
{
    /**
     * Create a new component instance.
     */
    public function __construct($name = 'user_id', $model = null, $id = 'user', $req = null, $class = 'single-select', $label = 'User', $for = null)
    {
        parent::__construct($name, $model, $id, $req, $class, $label, $for);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.user.user');
    }

}
