<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $type = 'text', $name, $value = '', $placeholder = '', $help  = '', $size = '', $readonly = false, $disabled = false, $required = false )
    {
        $this->label        = $label;
        $this->type         = $type;
        $this->name         = $name;
        $this->value        = $value;
        $this->placeholder  = $placeholder;
        $this->help         = $help;
        $this->size         = !empty($size) ? 'form-control-'.$size : '';
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
        return view('bs-component::input');
    }
}
