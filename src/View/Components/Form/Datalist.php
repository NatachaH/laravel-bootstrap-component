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
     * Display an hidden field next the input.
     * @var boolean
     */
    public $withHidden;

    /**
     * Name of the hidden field.
     * @var string
     */
    public $hiddenName;

    /**
     * Value of the hidden field.
     * @var string
     */
    public $hiddenValue;

    /**
     * Clean hidden name
     * Exemple: field[] become field
     *
     * @return string
     */
    public $cleanHiddenName;

    /**
     * Name of related error (ex: for hidden input)
     * @var string
     */
    public $relatedError;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $value = null, $placeholder = null, $options, $help  = null, $size = null, $readonly = false, $disabled = false, $required = false, $before = null, $after = null, $withHidden = false, $hiddenName = 'id', $hiddenValue = null, $relatedError = '')
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
        $this->withHidden       = $withHidden;
        $this->hiddenName       = $hiddenName;
        $this->hiddenValue      = $hiddenValue;
        $this->cleanHiddenName  = array_to_dot($this->hiddenName);
        $this->relatedError     = $relatedError;
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
