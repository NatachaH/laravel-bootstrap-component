<?php

namespace Nh\BsComponent\View\Components;

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
     * The placeholder of the input.
     *
     * @var string
     */
    public $placeholder;

    /**
     * The button of the input.
     *
     * @var string
     */
    public $button;

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
    public function __construct($label = '', $name, $placeholder = 'Choose a file...', $button = 'Browse', $help  = '', $size = '', $disabled = false, $required = false)
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->placeholder  = $placeholder;
        $this->button       = $button;
        $this->help         = $help;
        $this->size         = !empty($size) ? 'form-file-'.$size : '';
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
        return view('bs-component::input-file');
    }
}
