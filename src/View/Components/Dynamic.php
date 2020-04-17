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
     * Name of the folder where are the views to include.
     * @var string
     */
    public $folder;

    /**
     * The current items
     * @var string
     */
    public $currentItems;

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
    public function __construct($legend, $folder, $current = [], $isDynamic = true, $min = 1, $max = null, $deleteName = 'delete[]')
    {
        $this->legend       = $legend;
        $this->folder       = $folder;
        $this->currentItems = $current;
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
