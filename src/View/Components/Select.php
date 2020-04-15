<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * The label of the select.
     *
     * @var string
     */
    public $label;

    /**
     * The name of the select.
     *
     * @var string
     */
    public $name;

    /**
     * The options of the select.
     *
     * @var array
     */
    public $options;

    /**
     * The default value of the select.
     *
     * @var array
     */
    public $values;

    /**
     * The help message of the select.
     *
     * @var string
     */
    public $help;

    /**
     * The size of the select.
     *
     * @var string
     */
    public $size;

    /**
     * Is the select multiple.
     *
     * @var boolean
     */
    public $isMultiple;

    /**
     * Is the select disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Array of the disabled options
     *
     * @var array
     */
    private $optionsDisabled;

    /**
     * Is the select required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Check if the option is selected
     * @param  string  $option
     * @return boolean
     */
    public function isOptionSelected($option)
    {
        $currentValues = old($this->name,$this->values);
        return in_array($option, (array)$currentValues);
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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $name, $options, $values = '', $help  = '', $size = '', $multiple = false, $disabled = false, $required = false )
    {
        $this->label            = $label;
        $this->name             = $name;
        $this->options          = $options;
        $this->values           = $values;
        $this->help             = $help;
        $this->size             = !empty($size) ? 'form-select-'.$size : '';
        $this->isMultiple       = $multiple;
        $this->isDisabled       = is_bool($disabled) ? $disabled : false;
        $this->optionsDisabled  = is_array($disabled) ? $disabled : [];
        $this->isRequired       = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::select');
    }
}
