<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Input extends Component
{
    /**
     * The label of the input.
     *
     * @var string
     */
    public $label;

    /**
     * The type of the input.
     * Can be text, number, tel, phone, email, password etc.
     *
     * @var string
     */
    public $type;

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
     * Clean name
     * Exemple: field[] become field
     *
     * @return string
     */
    public $cleanName;

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
    public function __construct($label = null, $type = 'text', $name, $value = null, $placeholder = null, $help  = null, $size = null, $readonly = false, $disabled = false, $required = false, $inputGroup = false, $step = 1, $min = null, $max = null)
    {
        $this->label        = $label;
        $this->type         = $type;
        $this->name         = $name;
        $this->value        = $value;
        $this->placeholder  = $placeholder;
        $this->help         = $help;
        $this->size         = $size;
        $this->isReadonly   = $readonly;
        $this->isDisabled   = $disabled;
        $this->isRequired   = $required;
        $this->isInputGroup = $inputGroup;
        $this->step         = $step;
        $this->min          = $min;
        $this->max          = $max;
        $this->cleanName    = array_to_dot($this->name);
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
