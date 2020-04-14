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
     * Is the check disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the check disabled.
     *
     * @var boolean
     */
    public $isChecked;

    /**
     * Define the $isChecked by default value and old session
     * @param  boolean $default
     * @return boolean
     */
    private function defineIsChecked($default){

        $old = old(str_replace('[]', '', $this->name));

        if(!empty($old))
        {
           return is_array($old) ? in_array($this->value,$old) : $this->value == $old;
        }

        return $default;

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
    public function __construct($label = '', $type = 'checkbox', $name, $value = '', $disabled = false, $checked = false)
    {
        $this->label         = $label;
        $this->type          = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->name          = $name;
        $this->value         = $value;
        $this->isDisabled    = $disabled;
        $this->isChecked     = $this->defineIsChecked($checked);
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
