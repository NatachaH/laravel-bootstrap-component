<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class Datepicker extends FieldTemplate
{

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
     * Mode of the Datepicker
     * Available: single|multiple|range
     *
     * @var string
     */
    public $mode;

    /**
     * Format of the Datepicker
     * Available: datetime|datetime-short|date|time|time-short|db-datetime|db-date|db-time
     *
     * @var string
     */
    public $format;

    /**
     * Minimum date
     *
     * @var string
     */
    public $min;

    /**
     * Maximum date
     *
     * @var string
     */
    public $max;

    /**
     * Is an input group
     * @var boolean
     */
    public $isInputGroup;

    /**
     * Is inline
     * @var boolean
     */
    public $inline;

    /**
     * For range inputs
     * @var string
     */
    public $inputFrom;

    /**
     * For range inputs
     * @var string
     */
    public $inputTo;

    /**
     * Array of disabled dates
     * @var array
     */
    public $disabledDates;

    /**
     * Array of events
     * @var array
     */
    public $events;

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
      $size        = null,
      $mode        = 'single',
      $format      = 'datetime',
      $min         = null,
      $max         = null,
      $inline      = false,
      $inputFrom   = null,
      $inputTo     = null,
      $disabledDates = [],
      $events      = []
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

        $this->cleanName    = array_to_dot($this->name);
        $this->placeholder  = $placeholder;
        $this->size         = $size;
        $this->mode         = in_array($mode,['single','multiple','range']) ? $mode : 'single';
        $this->format       = in_array($format,['datetime','datetime-short','date','time','time-short','db-datetime','db-date','db-time']) ? $format : 'datetime';
        $this->min          = $min;
        $this->max          = $max;
        $this->isInputGroup = true;
        $this->inline       = $inline;
        $this->inputFrom    = $inputFrom;
        $this->inputTo      = $inputTo;
        $this->disabledDates= $disabledDates;
        $this->events       = $events;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.datepicker']);
    }
}
