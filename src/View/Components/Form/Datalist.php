<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class Datalist extends FieldTemplate
{

    /**
     * The placeholder of the input.
     *
     * @var string
     */
    public $placeholder;

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
     * Display an hidden field next the input.
     * @var boolean
     */
    public $withHidden;

    /**
     * Name of the hidden field.
     * @var string
     */
    public $hiddenName;

    /**
     * Value of the hidden field.
     * @var string
     */
    public $hiddenValue;

    /**
     * Clean hidden name
     * Exemple: field[] become field
     *
     * @return string
     */
    public $cleanHiddenName;

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
      $readonly = false,
      $before   = null,
      $after    = null,
      $errorRelated = null,
      $errorBag = null,
      $autocomplete = false,

      $placeholder = null,
      $options     = [],
      $size        = null,
      $withHidden  = false,
      $hiddenName  = 'id',
      $hiddenValue = null
    )
    {
        $this->label            = $label;
        $this->name             = $name;
        $this->value            = $value;
        $this->help             = $help;
        $this->isRequired       = $required;
        $this->isDisabled       = $disabled;
        $this->isReadonly       = $readonly;
        $this->before           = $before;
        $this->after            = $after;
        $this->errorRelated     = $errorRelated;
        $this->errorBag         = $errorBag;
        $this->autocomplete     = $autocomplete;

        $this->cleanName        = array_to_dot($this->name);
        $this->placeholder      = $placeholder;
        $this->options          = $options;
        $this->size             = $size;
        $this->withHidden       = $withHidden;
        $this->hiddenName       = $hiddenName;
        $this->hiddenValue      = $hiddenValue;
        $this->cleanHiddenName  = array_to_dot($this->hiddenName);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.datalist']);
    }
}
