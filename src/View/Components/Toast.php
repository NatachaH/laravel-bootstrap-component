<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Toast extends Component
{
    /**
     * The title of the toast.
     *
     * @var string
     */
    public $title;

    /**
     * The time of the toast.
     *
     * @var string
     */
    public $time;

    /**
     * The img source of the toast.
     *
     * @var string
     */
    public $img;

    /**
     * Has a close button.
     *
     * @var boolean
     */
    public $closable;

    /**
     * Is the toast auto hide.
     *
     * @var boolean
     */
    public $autohide;

    /**
     * The delay before autohide.
     *
     * @var int
     */
    public $delay;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $time = null, $img = null, $closable = false, $autohide = false, $delay = 10000)
    {
        $this->title      = $title;
        $this->time       = $time;
        $this->img        = $img;
        $this->closable   = $closable;
        $this->autohide   = $autohide;
        $this->delay      = $delay;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::toast');
    }
}
