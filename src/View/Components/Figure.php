<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Figure extends Component
{
    /**
     * The caption of the figure.
     *
     * @var string
     */
    public $caption;

    /**
     * The alignement of the figure caption.
     *
     * @var string
     */
    public $align;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($caption = null, $align = 'start')
    {
        $this->caption = $caption;
        $this->align   = $align;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::figure');
    }
}
