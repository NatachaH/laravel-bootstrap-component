<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Check extends Component
{
    /**
     * The label of the check.
     *
     * @var string
     */
    public $label;

    /**
     * The type of the check.
     *
     * @var string
     */
    public $type;

    /**
     * The name of the check.
     *
     * @var string
     */
    public $name;

    /**
     * The value of the check.
     *
     * @var string
     */
    public $value;

    /**
     * The default checked values.
     * Can be a string or an array.
     *
     * @var mixed
     */
    public $checkedValues;

    /**
     * Is the check disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the check checked.
     *
     * @var boolean
     */
    public function isChecked()
    {
        $currentValues = old($this->name,$this->checkedValues);

        if(is_array($currentValues))
        {
            return in_array($this->value, $currentValues);
        } else {
            return $this->value == $currentValues;
        }
    }

    /**
     * Generate the id of the checkbox
     *
     * @var string
     */
     public function id(){
        return str_replace('[]', '', $this->name).'Field'.strtoupper($this->value);
     }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $type = 'checkbox', $name, $value = '', $disabled = false, $checked = false; $checkedValues = '')
    {
        $this->label         = $label;
        $this->type          = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->name          = $name;
        $this->value         = $value;
        $this->isDisabled    = $disabled;
        $this->checkedValues = empty($checked) ? $checkedValues : $value;
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
