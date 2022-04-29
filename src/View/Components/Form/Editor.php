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
     * Toolbar emojis available
     *
     * @var array
     */
    public $emojis;

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

      $toolbar    = null,
      $headings   = null,
      $paragraphs = null,
      $divs       = null,
      $formats    = null,
      $colors     = null,
      $emojis     = null

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
        $this->toolbar      = is_null($toolbar) ? config('bs-component.editor.toolbar') : explode('|', $toolbar);
        $this->headings     = is_null($headings) ? config('bs-component.editor.headings') : ($headings ? explode('|', $headings) : []);
        $this->paragraphs   = is_null($paragraphs) ? config('bs-component.editor.paragraphs') : explode('|', $paragraphs);
        $this->divs         = is_null($divs) ? config('bs-component.editor.divs') : explode('|', $divs);
        $this->formats      = is_null($formats) ? config('bs-component.editor.formats') : explode('|', $formats);
        $this->colors       = is_null($colors) ? config('bs-component.editor.colors') : explode('|', $colors);
        $this->emojis       = is_null($emojis) ? config('bs-component.editor.emojis') : explode('|', $emojis);

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
