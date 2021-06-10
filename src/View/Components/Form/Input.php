<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class Input extends FieldTemplate
{
    /**
     * The type of the input.
     * Can be text, number, tel, phone, email, password etc.
     *
     * @var string
     */
    public $type;

    /**
     * The placeholder of the input.
     *
     * @var string
     */
    public $placeholder;

    /**
     * The size of the input.
     * Can be sm or lg
     *
     * @var string
     */
    public $size;

    /**
     * Step for input of type number
     *
     * @return float
     */
    public $step;

    /**
     * Min for input of type number
     *
     * @return float
     */
    public $min;

    /**
     * Max for input of type number
     *
     * @return float
     */
    public $max;

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

      $type = 'text',
      $placeholder = null,
      $size = null,
      $step = 1,
      $min = null,
      $max = null
    )
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->value        = $value;
        $this->help         = $help;
        $this->isRequired   = $required;
        $this->isDisabled   = $disabled;
        $this->isReadonly   = $readonly;
        $this->before       = $before;
        $this->after        = $after;
        $this->errorRelated = $errorRelated;
        $this->errorBag     = $errorBag;
        $this->autocomplete = $autocomplete;

        $this->cleanName    = array_to_dot($this->name);
        $this->type         = $type;
        $this->placeholder  = $placeholder;
        $this->size         = $size;
        $this->step         = $step;
        $this->min          = $min;
        $this->max          = $max;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.input']);
    }
}
