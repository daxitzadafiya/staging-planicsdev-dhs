<?php

namespace App\View\Components;

use Illuminate\View\Component;

class contactNewsLetter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title; 
    public $link; 
    public $text; 

    public function __construct(string $title, string $link, string $text)
    {
        $this->title = $title;
        $this->link = $link;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact-news-letter');
    }
}
