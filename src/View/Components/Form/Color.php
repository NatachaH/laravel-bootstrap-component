<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class Color extends FieldTemplate
{
    /**
     * The options of the select.
     *
     * @var array
     */
    public $options;

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

      $options  = []
      )
    {
        $this->label            = $label;
        $this->name             = $name;
        $this->value            = $value;
        $this->help             = $help;
        $this->isRequired       = $required;
        $this->isDisabled       = is_bool($disabled) ? $disabled : false;
        //$this->isReadonly       = $readonly;
        $this->before           = $before;
        $this->after            = $after;
        $this->errorRelated     = $errorRelated;
        $this->errorBag         = $errorBag;

        $this->cleanName        = array_to_dot($this->name);
        $this->options          = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.color']);
    }
}
