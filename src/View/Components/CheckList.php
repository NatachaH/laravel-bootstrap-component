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
     * Can be a string or an array.
     *
     * @var mixed
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
     * The options who are disabled in the list.
     *
     * @var array
     */
    public $optionsDisabled;

    /**
     * Check if the item is checked
     * @param  string  $option
     * @return boolean
     */
    public function isOptionChecked($option)
    {
        $currentValues = old($this->name,$this->values);
        return in_array($option, $currentValues);
    }

    /**
     * Check if the option is disabled
     * @param  string  $option
     * @return boolean
     */
    public function isOptionDisabled($option)
    {
        return in_array($option, $this->optionsDisabled);
    }

    /**
     * Generate the id of the checkbox
     *
     * @var string
     */
     public function idCheckbox($option){
        return str_replace('[]', '', $this->name).'Field'.strtoupper($option);
     }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $type = 'checkbox', $name, $options, $values = [], $help  = '', $disabled = false, $required = false, $optionsDisabled = [])
    {
        $this->label            = $label;
        $this->type             = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->name             = $name;
        $this->options          = $options;
        $this->values           = (array)$values;
        $this->help             = $help;
        $this->isDisabled       = $disabled;
        $this->isRequired       = $required;
        $this->optionsDisabled  = (array)$optionsDisabled;
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
