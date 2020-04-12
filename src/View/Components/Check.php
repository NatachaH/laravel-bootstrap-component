<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Check extends Component
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
     * Is the input disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $type = 'checkbox', $name, $value = '', $disabled = false)
    {
        $this->label        = $label;
        $this->type         = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->name         = $name;
        $this->value        = $value;
        $this->isDisabled   = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::check');
    }
}
