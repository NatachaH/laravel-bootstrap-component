<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * The header of the card.
     *
     * @var string
     */
    public $header;

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
    public function __construct($header = null, $footer = null)
    {
        $this->header = $header;
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
