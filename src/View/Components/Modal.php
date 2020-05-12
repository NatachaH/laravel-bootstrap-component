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
     * Has a close button.
     *
     * @var boolean
     */
    public $closable;

    /**
     * The size of the modal.
     *
     * @var string
     */
    public $size;

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
    public function __construct($title = '', $closable = true, $size = 'md', $fullscreen = false, $fullscreenSize = null, $centered = true, $scrollable = false)
    {
        $this->title                = $title;
        $this->closable             = $closable;
        $this->size                 = $size;
        $this->isFullscreen         = $fullscreen;
        $this->fullscreenSize       = $fullscreenSize;
        $this->isCentered           = $centered;
        $this->scrollable           = $scrollable;
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
