<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class CheckList extends Component
{
    /**
     * The label of the check list.
     *
     * @var string
     */
    public $label;

    /**
     * The type of the check.
     *
     * @var string
     */
    public $type;

    /**
     * The name of the check list.
     *
     * @var string
     */
    public $name;

    /**
     * The options of the check list.
     *
     * @var array
     */
    public $options;

    /**
     * The default value of the check list.
     *
     * @var array
     */
    public $values;

    /**
     * The help message of the check list.
     *
     * @var string
     */
    public $help;

    /**
     * Is the check list disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the input required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Check if the item is checked
     * @param  string  $option
     * @return boolean
     */
    public function isChecked($option)
    {
        return in_array($option, old($this->name,$this->values));
    }

    /**
     * Generate the id of the checkbox
     *
     * @var string
     */
     public function idCheckbox(){
        return str_replace('[]', '', $this->name).'Field'.strtoupper($this->value);
     }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $type = 'checkbox', $name, $options, $values = [], $help  = '', $disabled = false, $required = false)
    {
        $this->label        = $label;
        $this->type         = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->name         = $name;
        $this->options      = $options;
        $this->values       = $values;
        $this->help         = $help;
        $this->isDisabled   = $disabled;
        $this->isRequired   = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::check-list');
    }
}
