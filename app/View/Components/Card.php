<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $cardButton;
    /**
     * Create a new component instance.
     */
    public function __construct($title = null,$cardButton = null)
    {
        $this->title = $title;
        $this->cardButton = $cardButton;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.card');
    }
}
