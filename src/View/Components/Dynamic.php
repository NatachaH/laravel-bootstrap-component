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
    public $items;

    /**
     * The path for the current item view
     * @var string
     */
    public $viewItem;

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
     * The help message of the fieldset.
     *
     * @var string
     */
    public $help;

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
     * Information for the delete buttons
     * Class, label and value
     * @var array
     */
    public $btnDelete;

    /**
     * Name for the input delete
     * @var string
     */
    public $deleteName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legend, $items = [], $viewItem = '', $min = 1, $max = null, $help = '', $deleteName = '', $btnAdd = [], $btnRemove = [], $btnDelete = [])
    {
        $this->legend       = $legend;
        $this->items        = $items;
        $this->viewItem     = $viewItem;
        $this->min          = $min;
        $this->max          = $max;
        $this->help         = $help;
        $this->btnAdd       = empty($btnAdd) ? config('bs-component.dynamic-buttons.add') : $btnAdd;
        $this->btnRemove    = empty($btnRemove) ? config('bs-component.dynamic-buttons.remove') : $btnRemove;
        $this->btnDelete    = empty($btnDelete) ? config('bs-component.dynamic-buttons.delete') : $btnDelete;
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
