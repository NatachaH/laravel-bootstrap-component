<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $name, $value = '', $placeholder = '', $help  = '', $readonly = false, $disabled = false, $required = false)
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->value        = $value;
        $this->placeholder  = $placeholder;
        $this->help         = $help;
        $this->isReadonly   = $readonly;
        $this->isDisabled   = $disabled;
        $this->isRequired   = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::textarea');
    }
}
