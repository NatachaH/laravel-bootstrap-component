<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class CheckList extends FieldTemplate
{
    /**
     * The type of the check.
     * Can be checkbox or radio
     *
     * @var string
     */
    public $type;

    /**
     * The options of the check list.
     * Must be key => value array
     *
     * @var array
     */
    public $options;

    /**
     * Is the check list inline.
     *
     * @var boolean
     */
    public $isInline;

    /**
     * Array of the checked options
     *
     * @var array
     */
    private $optionsChecked;

    /**
     * Array of the disabled options
     *
     * @var array
     */
    private $optionsDisabled;

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
     * Check if an option is disabled
     * @param  string  $option
     * @return boolean
     */
    public function isOptionDisabled($option)
    {
        return in_array($option, $this->optionsDisabled);
    }

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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
      $label    = null,
      $name     = null,
      $value    = null,
      $help     = null,
      $required = false,
      $disabled = false,
      //$readonly = false,
      $before   = null,
      $after    = null,
      $errorRelated = null,
      $errorBag = null,

      $type     = 'checkbox',
      $options  = [],
      $inline   = false,
      $checked  = []
    )
    {
        $this->label            = $label;
        $this->name             = $name;
        $this->help             = $help;
        $this->isRequired       = $required;
        $this->isDisabled       = is_bool($disabled) ? $disabled : false;
        $this->before           = false;
        $this->after            = false;
        $this->errorRelated     = $errorRelated;
        $this->errorBag         = $errorBag;

        $this->cleanName        = array_to_dot($this->name);
        $this->type             = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->options          = $options;
        $this->isInline         = $inline;
        $this->optionsChecked   = (array)$checked;
        $this->optionsDisabled  = is_array($disabled) ? $disabled : [];
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
