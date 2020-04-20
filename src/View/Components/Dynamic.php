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
     * Can you add/remove dynamically the inputs
     * @var boolean
     */
    public $isActive;

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
     * Information for the add button
     * Class, label and value
     * @var array
     */
    public $btnAdd;

    /**
     * Information for the remove buttons
     * Class, label and value
     * @var array
     */
    public $btnRemove;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legend, $isActive = true, $min = 1, $max = null, $btnAdd = [], $btnRemove = [])
    {
        $this->legend       = $legend;
        $this->isActive     = $isActive;
        $this->min          = $min;
        $this->max          = $max;
        $this->btnAdd       = $btnAdd;
        $this->btnRemove    = $btnRemove;
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
