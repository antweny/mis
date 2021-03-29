<?php

namespace App\View\Components\Dropdown;

use Illuminate\View\Component;

class AssetType extends Component
{
    public $req;
    public $model;
    public $name;

    /**
     * Create a new component instance.
     */
    public function __construct($req = null, $model = null,$name = 'asset_type_id')
    {
        $this->req = $req;
        $this->model = $model;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dropdown.asset-type');
    }
}
