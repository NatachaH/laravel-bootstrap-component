<?php

namespace Nh\BsComponent\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * The title of the modal.
     *
     * @var string
     */
    public $title;

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
     * Has a close button.
     *
     * @var boolean
     */
    public $closable;

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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $footer = null, $size = 'md', $closable = false, $centered = false, $scrollable = false, $fullscreen = false, $fullscreenSize = null)
    {
        $this->title                = $title;
        $this->footer               = $footer;
        $this->size                 = $size;
        $this->closable             = $closable;
        $this->isCentered           = $centered;
        $this->scrollable           = $scrollable;
        $this->isFullscreen         = $fullscreen;
        $this->fullscreenSize       = $fullscreenSize;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::modal');
    }
}
