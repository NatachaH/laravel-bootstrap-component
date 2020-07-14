<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Str;

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
     * Toolbar options
     *
     * @var array
     */
    public $toolbar;

    /**
     * Toolbar colors available
     *
     * @var array
     */
    public $colors;

    /**
     * Toolbar colors available
     *
     * @var array
     */
    public $headers;

    /**
     * Toolbar formats available
     *
     * @var array
     */
    public $formats;

    /**
     * Clean name
     * Exemple: field[] become field
     *
     * @return string
     */
    public $cleanName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $value = null, $help  = null, $required = false, $toolbar = 'header|format|list|link|color', $colors = 'primary|success|warning|danger', $headers = 'lead|blockquote|1|2|3', $formats = 'bold|italic|underline|strike')
    {
        $this->label        = $label;
        $this->name         = $name;
        $this->value        = $value;
        $this->help         = $help;
        $this->isRequired   = $required;
        $this->cleanName    = array_to_dot($this->name);

        // Define the toolbar
        $this->toolbar = explode('|', $toolbar);

        // Define toolbar colors
        $this->colors = explode('|', $colors);
        $this->headers = explode('|', $headers);
        $this->formats = explode('|', $formats);
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
