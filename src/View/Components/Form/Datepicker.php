<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Datepicker extends Component
{
    /**
     * The label of the input.
     *
     * @var string
     */
    public $label;

    /**
     * The name of the input.
     *
     * @var string
     */
    public $name;

    /**
     * The default value of the input.
     *
     * @var string
     */
    public $value;

    /**
     * The placeholder of the input.
     *
     * @var string
     */
    public $placeholder;

    /**
     * The help message of the input.
     *
     * @var string
     */
    public $help;

    /**
     * The size of the input.
     * Can be sm or lg
     *
     * @var string
     */
    public $size;

    /**
     * Is the input readonly.
     *
     * @var boolean
     */
    public $isReadonly;

    /**
     * Is the input disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the input required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Is the input is an input group.
     *
     * @var boolean
     */
    public $isInputGroup;

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
     * Name of input with minimum date
     *
     * @var string
     */
    public $minInput;

    /**
     * Name of input with maximum date
     *
     * @var string
     */
    public $maxInput;

    /**
     * Clean name
     * Exemple: field[] become field
     *
     * @return string
     */
    public $cleanName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $value = null, $placeholder = null, $help  = null, $size = null, $readonly = false, $disabled = false, $required = false, $mode = 'single', $format = 'datetime', $min = null, $max = null, $minInput = null, $maxInput = null)
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->value        = $value;
        $this->placeholder  = $placeholder;
        $this->help         = $help;
        $this->size         = $size;
        $this->isReadonly   = $readonly;
        $this->isDisabled   = $disabled;
        $this->isRequired   = $required;
        $this->isInputGroup = true;
        $this->mode         = !is_null($mode) && in_array($mode,['single','multiple','range']) ? $mode : 'single';
        $this->format       = !is_null($format) && in_array($format,['datetime','datetime-short','date','time','time-short','db-datetime','db-date','db-time']) ? $format : 'datetime';
        $this->min          = $min;
        $this->max          = $max;
        $this->minInput     = $minInput;
        $this->maxInput     = $maxInput;
        $this->cleanName    = array_to_dot($this->name);
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
