<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Textarea extends Component
{
    /**
     * The label of the textarea.
     *
     * @var string
     */
    public $label;

    /**
     * The name of the textarea.
     *
     * @var string
     */
    public $name;

    /**
     * The default value of the textarea.
     *
     * @var string
     */
    public $value;

    /**
     * The placeholder of the textarea.
     *
     * @var string
     */
    public $placeholder;

    /**
     * The help message of the textarea.
     *
     * @var string
     */
    public $help;

    /**
     * Is the textarea readonly.
     *
     * @var boolean
     */
    public $isReadonly;

    /**
     * Is the textarea disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the textarea required.
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
     * Name of related error (ex: for hidden input)
     * @var string
     */
    public $relatedError;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $value = null, $placeholder = null, $help  = null, $readonly = false, $disabled = false, $required = false, $before = null, $after = null, $relatedError = null)
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->value        = $value;
        $this->placeholder  = $placeholder;
        $this->help         = $help;
        $this->isReadonly   = $readonly;
        $this->isDisabled   = $disabled;
        $this->isRequired   = $required;
        $this->cleanName    = array_to_dot($this->name);
        $this->before       = $before;
        $this->after        = $after;
        $this->relatedError = $relatedError;
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
