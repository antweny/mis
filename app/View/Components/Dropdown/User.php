<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class User extends Component
{
    public $name;
    public $req;
    public $model;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $name = 'user_id', $req = null, $model = null )
    {
        $this->name = $name;
        $this->req = $req;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.dropdown.user');
    }
}
