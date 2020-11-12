<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;

class InputFile extends Component
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
     * Is the input disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the input multiple.
     *
     * @var boolean
     */
    public $isMultiple;

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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $help  = null, $size = null, $disabled = false, $multiple = false, $required = false, $inputGroup = false)
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->help         = $help;
        $this->size         = $size;
        $this->isDisabled   = $disabled;
        $this->isRequired   = $required;
        $this->isMultiple   = $multiple;
        $this->isInputGroup = $inputGroup;
        $this->cleanName    = array_to_dot($this->name);
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
