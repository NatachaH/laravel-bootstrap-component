<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Datalist extends Component
{
    /**
     * The label of the select.
     *
     * @var string
     */
    public $label;

    /**
     * The name of the select.
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
     * The options of the select.
     *
     * @var array
     */
    public $options;

    /**
     * The help message of the select.
     *
     * @var string
     */
    public $help;

    /**
     * The size of the select.
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
     * Is the select disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the select required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Clean name
     * Exemple: field[] become field
     *
     * @return string
     */
    public $cleanName;

    /**
     * Input group before
     * @var string
     */
    public $before;

    /**
     * Input group after
     * @var string
     */
    public $after;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $value = null, $placeholder = null, $options, $help  = null, $size = null, $readonly = false, $disabled = false, $required = false, $before = null, $after = null)
    {
        $this->label            = $label;
        $this->name             = $name;
        $this->value            = $value;
        $this->placeholder      = $placeholder;
        $this->options          = $options;
        $this->help             = $help;
        $this->size             = $size;
        $this->isReadonly       = $readonly;
        $this->isDisabled       = $disabled;
        $this->isRequired       = $required;
        $this->cleanName        = array_to_dot($this->name);
        $this->before           = $before;
        $this->after            = $after;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.field-template', ['field' => 'bs-component::form.field.datalist']);
    }
}
