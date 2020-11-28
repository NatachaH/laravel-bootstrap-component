<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;

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
     * The help message of the select.
     *
     * @var string
     */
    public $help;

    /**
     * The size of the select.
     * Can be sm or lg
     *
     * @var string
     */
    public $size;

    /**
     * Array of the selected options
     *
     * @var array
     */
    private $optionsSelected;

    /**
     * Check if the option is selected
     * @param  string  $option
     * @return boolean
     */
    public function isOptionSelected($option)
    {
        $currentValues = old($this->cleanName,$this->optionsSelected);
        return in_array($option, (array)$currentValues);
    }

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
     * Check if the option is disabled
     * @param  string  $option
     * @return boolean
     */
    public function isOptionDisabled($option)
    {
        return in_array($option, $this->optionsDisabled);
    }

    /**
     * Is the select required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Clean name
     * Exemple: field[] become field
     *
     * @return string
     */
    public $cleanName;

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
     * Name of related error (ex: for hidden input)
     * @var string
     */
    public $relatedError;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $options, $help  = null, $size = null, $selected = [],  $multiple = false, $disabled = false, $required = false, $before = null, $after = null, $relatedError = '')
    {
        $this->label            = $label;
        $this->name             = $name;
        $this->options          = $options;
        $this->help             = $help;
        $this->size             = $size;
        $this->optionsSelected  = (array)$selected;
        $this->isMultiple       = $multiple;
        $this->isDisabled       = is_bool($disabled) ? $disabled : false; // Make the select disabled
        $this->optionsDisabled  = is_array($disabled) ? $disabled : []; // Array of the key option that are disabled
        $this->isRequired       = $required;
        $this->cleanName        = array_to_dot($this->name);
        $this->before           = $before;
        $this->after            = $after;
        $this->relatedError     = $relatedError;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.select']);
    }
}
