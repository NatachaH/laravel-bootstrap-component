<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
     * Type of dynamic
     * If multiple dynamic on same page
     * @var string
     */
    public $type;

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
     * The default items
     * @var array
     */
    public $defaults;

    /**
     * The disabled items
     * @var array
     */
    public $itemsDisabled;

    /**
     * The help message of the fieldset.
     *
     * @var string
     */
    public $help;

    /**
     * Default config for buttons
     * @var string
     */
    public $btnConfig;

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
    public $btnMove;

    /**
     * Check if is Dynamic and display the add/remove button
     * @return boolean [description]
     */
    public function isDynamic()
    {
      return is_null($this->max) || $this->max != 1;
    }

    /**
     * Check if an item is disabled
     * @param  string  $item
     * @return boolean
     */
    public function isItemDisabled($item)
    {
        return in_array($item, $this->itemsDisabled);
    }

    /**
     * Check if an item is deleted
     * @param  string  $item
     * @return boolean
     */
    public function isItemDeleted($item)
    {
        return in_array($item, old('media_to_delete',[]));
    }

    /**
     * Define the buttons.
     *
     * @var array
     */
    protected function defineButton($name)
    {
        $config = config($this->btnConfig.'.'.$name);

        return [
          'class' => $config['class'],
          'label' => \Lang::has($config['label']) ? trans_choice($config['label'],1) : $config['label'],
          'value' => \Lang::has($config['value']) ? trans_choice($config['value'],1) : $config['value'],
        ];
    }

    /**
     * Define the defaults.
     *
     * @var array
     */
    protected function defineDefaults($defaults)
    {
        $old = old($this->name.'_to_add');
        $defaultsItems = [];

        if(!empty($old))
        {

            $defaultsItems = Arr::where($old, function ($value, $key) {
                return Str::endsWith($key, '_'.$this->type);
            });

        } else if(!empty($defaults)) {

            foreach ($defaults as $key => $value) {
              $defaultsItems[$key.'_'.$this->type] = $value;
            }

        }

        return $defaultsItems;
    }

    /**
     * Input group before
     * @var string
     */
    public $before;

    /**
     * Input group after
     * @var string
     */
    public $after;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legend, $listing = null, $template = null, $min = null, $max = null, $name = 'dynamic', $type = 'dynamic', $sortable = false, $items = [], $defaults = [], $itemsDisabled = [], $help = null, $btnConfig = 'bs-component.dynamic.buttons', $before = null, $after = null)
    {
        $this->legend           = $legend;
        $this->listing          = $listing;
        $this->template         = $template;
        $this->min              = $min;
        $this->max              = $max;
        $this->name             = $name;
        $this->type             = $type;
        $this->key              = 'KEY_'.$type;
        $this->sortable         = $sortable;
        $this->items            = $items;
        $this->defaults         = $this->defineDefaults($defaults);
        $this->itemsDisabled    = is_array($itemsDisabled) ? $itemsDisabled : [$itemsDisabled];
        $this->help             = $help;
        $this->btnConfig        = $btnConfig;
        $this->btnAdd           = $this->defineButton('add');
        $this->btnRemove        = $this->defineButton('remove');
        $this->btnDelete        = $this->defineButton('delete');
        $this->btnMove          = $this->defineButton('move');
        $this->before           = $before;
        $this->after            = $after;
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
