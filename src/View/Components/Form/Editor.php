<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;

class Editor extends Component
{
    /**
     * The label of the editor.
     *
     * @var string
     */
    public $label;

    /**
     * Name of the editor textarea
     *
     * @var string
     */
    public $name;

    /**
     * Current value of editor
     *
     * @var string
     */
    public $value;

    /**
     * The help message of the editor.
     *
     * @var string
     */
    public $help;

    /**
     * Is the editor textarea is required.
     *
     * @var boolean
     */
    public $isRequired;

    /**
     * Toolbar with Heading (p,h1,h2,h3)
     *
     * @var boolean
     */
    public $toolbarHasHeader;

    /**
     * Toolbar with Formats (bold,italic,underline,strike)
     *
     * @var boolean
     */
    public $toolbarHasFormat;

    /**
     * Toolbar with Lists (ordered,bullet)
     *
     * @var boolean
     */
    public $toolbarHasList;

    /**
     * Toolbar with Link
     *
     * @var boolean
     */
    public $toolbarHasLink;

    /**
     * Toolbar with Colors
     *
     * @var boolean
     */
    public $toolbarHasColor;

    /**
     * Toolbar colors available
     *
     * @var array
     */
    public $toolbarColors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $value = null, $help  = null, $required = false, $toolbar = 'header|format|list|link|color', $colors = 'primary|success|warning|danger')
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->value        = $value;
        $this->help         = $help;
        $this->isRequired   = $required;

        // Define the toolbar
        $toolbar = explode('|', $toolbar);
        $this->toolbarHasHeader = in_array('header',$toolbar);
        $this->toolbarHasFormat = in_array('format',$toolbar);
        $this->toolbarHasList   = in_array('list',$toolbar);
        $this->toolbarHasLink   = in_array('link',$toolbar);
        $this->toolbarHasColor  = in_array('color',$toolbar);

        // Define toolbar colors
        $this->toolbarColors = explode('|', $colors);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.editor');
    }
}
