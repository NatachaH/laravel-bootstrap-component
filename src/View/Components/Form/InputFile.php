<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class InputFile extends FieldTemplate
{
    /**
     * The size of the input.
     * Can be sm or lg
     *
     * @var string
     */
    public $size;

    /**
     * Is the input multiple.
     *
     * @var boolean
     */
    public $isMultiple;

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
      //$readonly = false,
      $before   = null,
      $after    = null,
      $errorRelated = null,
      $errorBag = null,

      $size = null,
      $multiple = false
    )
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->help         = $help;
        $this->isRequired   = $required;
        $this->isDisabled   = $disabled;
        $this->before       = $before;
        $this->after        = $after;
        $this->errorRelated = $errorRelated;
        $this->errorBag     = $errorBag;

        $this->cleanName    = array_to_dot($this->name);
        $this->size         = $size;
        $this->isMultiple   = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.input-file']);
    }
}
