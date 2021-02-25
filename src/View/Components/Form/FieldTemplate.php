<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;

class FieldTemplate extends Component
{
    /**
     * The label of the field.
     *
     * @var string
     */
    public $label;

    /**
     * The name of the field.
     *
     * @var string
     */
    public $name;

    /**
     * The default value of the field.
     *
     * @var string
     */
    public $value;

    /**
     * The help message of the field.
     *
     * @var string
     */
    public $help;

    /**
     * Is the field required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Is the field disabled.
     *
     * @var boolean
     */
    public $isDisabled;

    /**
     * Is the field readonly.
     *
     * @var boolean
     */
    public $isReadonly;

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
    public $error;

    /**
     * Name of error bag
     * @var string
     */
    public $errorBag;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(
      $label    = null,
      $name     = null,
      $value    = null,
      $help     = null,
      $required = false,
      $disabled = false,
      $readonly = false,
      $before   = null,
      $after    = null,
      $error    = null,
      $errorBag = null,
    )
    {
        return false;
    }
}
