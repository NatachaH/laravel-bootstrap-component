<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * The title of the card.
     *
     * @var string
     */
    public $title;

    /**
     * The footer of the card.
     *
     * @var string
     */
    public $footer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $footer = null)
    {
        $this->title  = $title;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::card');
    }
}
