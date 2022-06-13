<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VolunteeringItem extends Component
{

    public $title;
    public $text;
    public $route;

    public function __construct($title, $text, $route)
    {
        $this->title = $title;
        $this->text = $text;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('site.components.volunteering_item');
    }
}
