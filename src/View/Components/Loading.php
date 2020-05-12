<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Loading extends Component
{
    /**
     * The type of the loading.
     * Border or Grow
     *
     * @var string
     */
    public $type;

    /**
     * The color of the loading.
     *
     * @var string
     */
    public $color;

    /**
     * The title of the loading.
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'border', $color = 'primary', $title = null)
    {
        $this->type   = in_array($type,['border','grow']) ? $type : 'border';
        $this->color  = $color;
        $this->title  = is_null($title) ? __('bs-component::button.loading') : $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::loading');
    }
}
