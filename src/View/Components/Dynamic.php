<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Dynamic extends Component
{

    /**
     * The legend of the fieldset
     * @var string
     */
    public $legend;

    /**
     * The current items
     * @var array
     */
    public $currentItems;

    /**
     * The folder path for the views.
     * @var string
     */
    public $folder;

    /**
     * Can you add/remove dynamically the inputs (nh/bs-component)
     * @var boolean
     */
    public $isDynamic;

    /**
     * Minimum nbr of inputs
     * @var int
     */
    public $min;

    /**
     * Maximum nbr of inputs
     * @var int
     */
    public $max;

    /**
     * Name of the delete checkbox.
     * @var string
     */
    public $deleteName;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legend, $current = [], $folder = '', $isDynamic = true, $min = 1, $max = null, $deleteName = 'delete[]')
    {
        $this->legend       = $legend;
        $this->currentItems = $current;
        $this->folder       = $folder;
        $this->isDynamic    = $isDynamic;
        $this->min          = $min;
        $this->max          = $max;
        $this->deleteName   = $deleteName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::dynamic');
    }
}
