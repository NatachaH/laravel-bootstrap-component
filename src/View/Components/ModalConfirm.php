<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class ModalConfirm extends Component
{

    /**
     * The color of the modal.
     *
     * @var string
     */
    public $color;

    /**
     * The icon of the modal.
     *
     * @var string
     */
    public $icon;

    /**
     * The title of the modal.
     *
     * @var string
     */
    public $title;

    /**
     * The url action for the form in the modal.
     *
     * @var string
     */
    public $action;

    /**
     * The method of the form in the modal.
     *
     * @var string
     */
    public $method;

    /**
     * The footer of the modal.
     *
     * @var string
     */
    public $footer;

    /**
     * The size of the modal.
     *
     * @var string
     */
    public $size;

    /**
     * Is the modal centered.
     *
     * @var boolean
     */
    public $isCentered;

    /**
     * Is the modal scrollable.
     *
     * @var boolean
     */
    public $scrollable;

    /**
     * Is the modal fullscreen.
     *
     * @var boolean
     */
    public $isFullscreen;

    /**
     * The size below which the modal is fullscreen.
     *
     * @var string
     */
    public $fullscreenSize;

    /**
     * Is the modal backdrop static.
     *
     * @var boolean
     */
    public $isStatic;

    /**
     * Information for the cancel button
     * Class, label and value
     * @var array
     */
    public $btnCancel;

    /**
     * Information for the confirm button
     * Class, label and value
     * @var array
     */
    public $btnConfirm;

    /**
     * Get the fullscreen class.
     *
     * @var string
     */
    public function fullscreenClass(){
      if($this->isFullscreen) {
        $fullscreen = empty($this->fullscreenSize) ? 'modal-fullscreen' : 'modal-fullscreen-'.$this->fullscreenSize.'-down';
      } else {
        $fullscreen = '';
      }
      return $fullscreen;
    }

    /**
     * Define the buttons.
     *
     * @var array
     */
    private function defineButton($name, $custom = [])
    {
      return [
        'class' => array_key_exists('class',$custom) ? $custom['class'] : config('bs-component.modal-confirm.buttons.'.$name),
        'label' => array_key_exists('label',$custom) ? $custom['label'] : __('bs-component::button.'.$name),
        'value' => array_key_exists('value',$custom) ? $custom['value'] : __('bs-component::button.'.$name)
      ];
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = 'primary', $icon = null, $title = null, $action = '#', $method = 'POST', $footer = null, $size = 'md', $centered = false, $scrollable = false, $fullscreen = false, $fullscreenSize = null, $isStatic = false, $btnCancel = [], $btnConfirm = [])
    {
        $this->color                = $color;
        $this->icon                 = $icon;
        $this->title                = $title;
        $this->action               = $action;
        $this->method               = $method;
        $this->footer               = $footer;
        $this->size                 = $size;
        $this->isCentered           = $centered;
        $this->scrollable           = $scrollable;
        $this->isFullscreen         = $fullscreen;
        $this->fullscreenSize       = $fullscreenSize;
        $this->isStatic             = $isStatic;
        $this->btnCancel            = $this->defineButton('cancel',$btnCancel);
        $this->btnConfirm           = $this->defineButton('confirm',$btnConfirm);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::modal-confirm');
    }
}
