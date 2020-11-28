<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;

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
     * Can be checkbox or radio
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
     * Must be key => value array
     *
     * @var array
     */
    public $options;

    /**
     * The help message of the check list.
     *
     * @var string
     */
    public $help;

    /**
     * Array of the checked options
     *
     * @var array
     */
    private $optionsChecked;

    /**
     * Check if an option is checked
     * @param  string  $option
     * @return boolean
     */
    public function isOptionChecked($option)
    {
        $currentValues = old($this->cleanName,$this->optionsChecked);
        return in_array($option, (array)$currentValues);
    }

    /**
     * Is the check list disabled.
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
     * Check if an option is disabled
     * @param  string  $option
     * @return boolean
     */
    public function isOptionDisabled($option)
    {
        return in_array($option, $this->optionsDisabled);
    }

    /**
     * Is the check list inline.
     *
     * @var boolean
     */
    public $isInline;

    /**
     * Is the input required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Generate the id of the option
     * Exemple: field[] become fieldValue
     *
     * @var string
     */
     public function idOption($option)
     {
        return $this->cleanName.Str::upper($option);
     }

     /**
      * Clean name
      * Exemple: field[] become field
      *
      * @return string
      */
     public $cleanName;

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
    public function __construct($label = null, $type = 'checkbox', $name, $options, $help  = null, $checked = [], $disabled = false, $inline = false, $required = false, $relatedError = '')
    {
        $this->label            = $label;
        $this->type             = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->name             = $name;
        $this->options          = $options;
        $this->help             = $help;
        $this->optionsChecked   = (array)$checked;
        $this->isDisabled       = is_bool($disabled) ? $disabled : false; // Make all the options disabled
        $this->optionsDisabled  = is_array($disabled) ? $disabled : []; // Array of the key option that are disabled
        $this->isInline         = $inline;
        $this->isRequired       = $required;
        $this->cleanName        = array_to_dot($this->name);
        $this->relatedError     = $relatedError;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.check-list']);
    }
}
