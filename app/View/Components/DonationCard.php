<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DonationCard extends Component
{
    public $title;
    public $text;
    public $isRecommended;

    public function __construct($title, $text, $isRecommended)
    {
        $this->title = $title;
        $this->text = $text;
        $this->isRecommended = $isRecommended;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('site.components.donation_card');
    }
}
