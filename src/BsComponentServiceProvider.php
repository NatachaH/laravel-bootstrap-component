<?php
namespace Nh\BsComponent;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BsComponentServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      // VENDORS
      $this->publishes([
          __DIR__.'/../config/dynamic.php' => config_path('dynamic.php')
      ], 'bs-component');

      // VIEWS
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'bs-component');

      // BLADES
      Blade::component('bs-input', \Nh\BsComponent\View\Components\Form\Input::class);
      Blade::component('bs-textarea', \Nh\BsComponent\View\Components\Form\Textarea::class);
      Blade::component('bs-check', \Nh\BsComponent\View\Components\Form\Check::class);
      Blade::component('bs-check-list', \Nh\BsComponent\View\Components\Form\CheckList::class);
      Blade::component('bs-select', \Nh\BsComponent\View\Components\Form\Select::class);
      Blade::component('bs-input-file', \Nh\BsComponent\View\Components\Form\InputFile::class);
      Blade::component('bs-dynamic', \Nh\BsComponent\View\Components\Form\Dynamic::class);
      Blade::component('bs-datepicker', \Nh\BsComponent\View\Components\Form\Datepicker::class);
      Blade::component('bs-card', \Nh\BsComponent\View\Components\Card::class);

    }
}
