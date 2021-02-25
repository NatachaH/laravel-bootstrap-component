<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class Editor extends FieldTemplate
{
    /**
     * Toolbar options
     *
     * @var array
     */
    public $toolbar;

    /**
     * Toolbar colors available
     *
     * @var array
     */
    public $colors;

    /**
     * Toolbar colors available
     *
     * @var array
     */
    public $headers;

    /**
     * Toolbar formats available
     *
     * @var array
     */
    public $formats;

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
      //$disabled = false,
      //$readonly = false,
      //$before   = null,
      //$after    = null,
      $errorRelated = null,
      $errorBag = null,

      $toolbar = 'header|format|list|link|color',
      $colors = 'primary|success|warning|danger',
      $headers = 'lead|blockquote|1|2|3',
      $formats = 'bold|italic|underline|strike'
    )
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->value        = $value;
        $this->help         = $help;
        $this->isRequired   = $required;
        $this->errorRelated = $errorRelated;
        $this->errorBag     = $errorBag;

        $this->cleanName    = array_to_dot($this->name);
        $this->toolbar      = explode('|', $toolbar);
        $this->colors       = explode('|', $colors);
        $this->headers      = explode('|', $headers);
        $this->formats      = explode('|', $formats);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.editor');
    }
}
