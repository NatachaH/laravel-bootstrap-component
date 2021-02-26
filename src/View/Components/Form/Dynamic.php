<?php

namespace Nh\BsComponent\View\Components\Form;

use Illuminate\View\Component;
use Nh\BsComponent\View\Components\Form\DynamicTemplate;

class Dynamic extends DynamicTemplate
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
      $legend   = null,
      $listing  = null,
      $template = null,
      $min      = null,
      $max      = null,
      $name     = 'dynamic',
      $type     = 'dynamic',
      $sortable = false,
      $items    = [],
      $defaults = [],
      $itemsDisabled = [],
      $help     = null,
      $btnConfig = 'bs-component.dynamic.buttons',
      $before   = null,
      $after    = null
    )
    {
        $this->legend           = $legend;
        $this->listing          = $listing;
        $this->template         = $template;
        $this->min              = $min;
        $this->max              = $max;
        $this->name             = $name;
        $this->type             = $type;
        $this->key              = 'KEY_'.$type;
        $this->sortable         = $sortable;
        $this->items            = $items;
        $this->defaults         = $this->defineDefaults($defaults);
        $this->itemsDisabled    = is_array($itemsDisabled) ? $itemsDisabled : [$itemsDisabled];
        $this->help             = $help;
        $this->btnConfig        = $btnConfig;
        $this->btnAdd           = $this->defineButton('add');
        $this->btnRemove        = $this->defineButton('remove');
        $this->btnDelete        = $this->defineButton('delete');
        $this->btnMove          = $this->defineButton('move');
        $this->before           = $before;
        $this->after            = $after;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('bs-component::form.dynamic-template');
    }
}
