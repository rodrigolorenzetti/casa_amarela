<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GalleryImage extends Component
{
    public $title;
    public $pathWebp;
    public $pathPng;

    public function __construct($title, $pathWebp, $pathPng)
    {
        $this->title = $title;
        $this->pathWebp = $pathWebp;
        $this->pathPng = $pathPng;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('site.components.gallery_image');
    }
}
