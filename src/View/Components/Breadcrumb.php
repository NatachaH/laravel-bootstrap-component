<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * The links.
     * Key => Name of the link &  Value => Route name of the link
     *
     * @var array
     */
    public $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($links = null)
    {
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::breadcrumb');
    }
}
