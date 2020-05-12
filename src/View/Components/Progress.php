<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Progress extends Component
{
    /**
     * The color of the bar.
     *
     * @var string
     */
    public $color;

    /**
     * The value of the bar.
     *
     * @var int
     */
    public $value;

    /**
     * The min value of the bar.
     *
     * @var int
     */
    public $min;

    /**
     * The max value of the bar.
     *
     * @var int
     */
    public $max;

    /**
     * The caption of the bar.
     *
     * @var string
     */
    public $caption;

    /**
     * Is the bar stripped.
     *
     * @var boolean
     */
    public $isStripped;

    /**
     * Is the bar animated.
     *
     * @var boolean
     */
    public $isAnimated;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = 'primary', $value = 0, $min = 0, $max = 100, $caption = '', $stripped = false, $animated = false)
    {
        $this->color      = $color;
        $this->value      = $value;
        $this->min        = $min;
        $this->max        = $max;
        $this->caption    = $caption;
        $this->isStripped = $stripped;
        $this->isAnimated = $animated;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::progress');
    }
}
