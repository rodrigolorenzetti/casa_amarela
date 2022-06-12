<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PartnerItem extends Component
{
    public $name;
    public $normalSrc;
    public $webpSrc;

    public function __construct($name, $normalSrc, $webpSrc)
    {
        $this->name = $name;
        $this->normalSrc = $normalSrc;
        $this->webpSrc = $webpSrc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('site.components.partner_item');
    }
}
