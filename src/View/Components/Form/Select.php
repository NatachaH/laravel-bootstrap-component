<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class Select extends FieldTemplate
{
    /**
     * The options of the select.
     *
     * @var array
     */
    public $options;

    /**
     * The size of the select.
     * Can be sm or lg
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
     * Array of the selected options
     *
     * @var array
     */
    public $optionsSelected;

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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
      $label    = null,
      $name     = null,
      //$value    = null,
      $help     = null,
      $required = false,
      $disabled = false,
      $readonly = false,
      $before   = null,
      $after    = null,
      $errorRelated = null,
      $errorBag = null,

      $options  = [],
      $size     = null,
      $selected = [],
      $multiple = false
      )
    {
        $this->label            = $label;
        $this->name             = $name;
        $this->help             = $help;
        $this->isRequired       = $required;
        $this->isDisabled       = is_bool($disabled) ? $disabled : false;
        $this->isReadonly       = $readonly;
        $this->before           = $before;
        $this->after            = $after;
        $this->errorRelated     = $errorRelated;
        $this->errorBag         = $errorBag;

        $this->cleanName        = array_to_dot($this->name);
        $this->options          = $options;
        $this->size             = $size;
        $this->isMultiple       = $multiple;
        $this->optionsSelected  = (array)$selected;
        $this->optionsDisabled  = is_array($disabled) ? $disabled : [];
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
