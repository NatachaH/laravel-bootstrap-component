<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Calendar extends Component
{
    /**
     * The color of the calendar.
     *
     * @var string
     */
    public $color;

    /**
     * Url for loading events per month.
     *
     * @var boolean
     */
    public $eventsLoadUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = null, $eventsLoadUrl = null)
    {
        $this->color         = $color;
        $this->eventsLoadUrl = $eventsLoadUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::calendar');
    }
}
