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
     * Toolbar headings available
     *
     * @var array
     */
    public $headings;

    /**
     * Toolbar paragraphs available
     *
     * @var array
     */
    public $paragraphs;

    /**
     * Toolbar divs available
     *
     * @var array
     */
    public $divs;

    /**
     * Toolbar formats available
     *
     * @var array
     */
    public $formats;

    /**
     * Toolbar colors available
     *
     * @var array
     */
    public $colors;

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

      $toolbar    = 'font|format|list|link|color',
      $headings   = '1|2|3',
      $paragraphs = 'lead',
      $divs       = 'blockquote',
      $formats    = 'bold|italic|underline|strike',
      $colors     = 'primary|success|warning|danger'
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
        $this->headings     = !empty($headings) ? explode('|', $headings) : null;
        $this->paragraphs   = !empty($paragraphs) ? explode('|', $paragraphs) : null;
        $this->divs         = !empty($divs) ? explode('|', $divs) : null;
        $this->formats      = explode('|', $formats);
        $this->colors       = explode('|', $colors);
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
