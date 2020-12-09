<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Blockquote extends Component
{
    /**
     * The source of the quote.
     *
     * @var string
     */
    public $source;

    /**
     * The alignement of the quote.
     *
     * @var string
     */
    public $align;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($source = null, $align = 'start')
    {
        $this->source = $source;
        $this->align  = $align;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::blockquote');
    }
}
