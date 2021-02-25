<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Nh\BsComponent\View\Components\Form\FieldTemplate;

class Check extends FieldTemplate
{

    /**
     * The type of the check.
     * Can be checkbox or radio
     *
     * @var string
     */
    public $type;

    /**
     * Is the field checked.
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
        $value = old($this->cleanName);

        if(!is_null($value))
        {
            return is_array($value) ? in_array($this->value,$value) : $value;
        } else {
            return $default;
        }
    }

    /**
     * Generate the id of the checkbox
     *
     * @var string
     */
     public function id()
     {
        return $this->cleanName.Str::upper($this->value);
     }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
      $label    = null,
      $name     = null,
      $value    = '1',
      $help     = null,
      $required = false,
      $disabled = false,
      //$readonly = false,
      //$before   = null,
      //$after    = null,
      $error    = null,
      $errorBag = null,

      $type = 'checkbox',
      $checked = false,
      $boolean = false
    )
    {
        $this->label         = $label;
        $this->name          = $name;
        $this->value         = $value;
        $this->help          = $help;
        $this->isRequired    = $required;
        $this->isDisabled    = $disabled;
        $this->error         = $error;
        $this->errorBag      = $errorBag;

        $this->cleanName     = array_to_dot($this->name);
        $this->type          = in_array($type, ['checkbox','radio']) ? $type : 'checkbox';
        $this->isChecked     = $this->defineIsChecked($checked);
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
