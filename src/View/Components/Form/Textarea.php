<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class Textarea extends FieldTemplate
{

    /**
     * The placeholder of the textarea.
     *
     * @var string
     */
    public $placeholder;

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
      $error    = null,
      $errorBag = null,

      $placeholder = null
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
        $this->error        = $error;
        $this->errorBag     = $errorBag;

        $this->cleanName    = array_to_dot($this->name);
        $this->placeholder  = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.textarea']);
    }
}
