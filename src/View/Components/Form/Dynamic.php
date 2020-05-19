<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;

class Dynamic extends Component
{

    /**
     * The legend of the fieldset
     * @var string
     */
    public $legend;

    /**
     * The listing view path.
     * @var string
     */
    public $listing;

    /**
     * The template view path.
     * @var string
     */
    public $template;

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
     * Name for the inputs
     * By default it's name + '_to_update', '_to_delete' and '_to_add'
     * @var string
     */
    public $name;

    /**
     * Default KEY to replace for the template
     * @var string
     */
    public $key;

    /**
     * Is the list sortable ?
     * If true display a button to drag&drop + an input with the position.
     * @var boolean
     */
    public $sortable;

    /**
     * The current items
     * @var array
     */
    public $items;

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
     * Information for the sortable buttons
     * Class, label and value
     * @var array
     */
    public $btnSortable;

    /**
     * Check if is Dynamic and display the add/remove button
     * @return boolean [description]
     */
    public function isDynamic()
    {
      return !is_null($this->max) && $this->max != 1;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legend, $listing = null, $template = null, $min = null, $max = null, $name = 'dynamic', $sortable = false, $items = [], $help = null, $btnAdd = [], $btnRemove = [], $btnDelete = [], $btnSortable = [])
    {
        $this->legend           = $legend;
        $this->listing          = $listing;
        $this->template         = $template;
        $this->min              = $min;
        $this->max              = $max;
        $this->name             = $name;
        $this->key              = 'KEY';
        $this->sortable         = $sortable;
        $this->items            = $items;
        $this->help             = $help;
        $this->btnAdd           = empty($btnAdd) ? config('dynamic.buttons.add') : $btnAdd;
        $this->btnRemove        = empty($btnRemove) ? config('dynamic.buttons.remove') : $btnRemove;
        $this->btnDelete        = empty($btnDelete) ? config('dynamic.buttons.delete') : $btnDelete;
        $this->btnSortable      = empty($btnSortable) ? config('dynamic.buttons.sortable') : $btnSortable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.dynamic-template');
    }
}
