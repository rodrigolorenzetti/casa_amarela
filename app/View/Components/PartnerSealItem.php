<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PartnerSealItem extends Component
{

    public $title;
    public $text;

    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function render()
    {
        return view('site.components.partner_seal_item');
    }
}
