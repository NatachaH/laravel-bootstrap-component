<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;

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
     * Can be checkbox or radio
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
     * The help message of the check.
     *
     * @var string
     */
    public $help;

    /**
     * Is the check disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the check required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Is the check disabled.
     *
     * @var boolean
     */
    public $isChecked;

    /**
     * Is the check a boolean value.
     *
     * @var boolean
     */
    public $isBoolean;

    /**
     * Define the $isChecked by default value and old session
     * @param  boolean $default
     * @return boolean
     */
    private function defineIsChecked($default)
    {
        $value = old($this->cleanName(), $this->value);
        return is_array($value) ? in_array($this->value,$value) : $value;
    }

    /**
     * Generate the id of the checkbox
     *
     * @var string
     */
     public function id()
     {
        return $this->cleanName().Str::upper($this->value);
     }

     /**
      * Clean the name
      * Exemple: field[] become field
      *
      * @return string
      */
     public function cleanName()
     {
          return (string)Str::of($this->name)->replace('[]', '')->replace('[', '.')->replace(']', '');
     }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $type = 'checkbox', $name, $value = '1', $help = null, $checked = false, $disabled = false, $required = false, $boolean = false)
    {
        $this->label         = $label;
        $this->type          = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->name          = $name;
        $this->value         = $value;
        $this->help          = $help;
        $this->isChecked     = $this->defineIsChecked($checked);
        $this->isDisabled    = $disabled;
        $this->isRequired    = $required;
        $this->isBoolean     = $boolean;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.check');
    }
}
