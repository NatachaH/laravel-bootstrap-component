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

      // VIEWS
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'bs-component');

      // BLADES
      Blade::component('bs-input', \Nh\BsComponent\View\Components\Input::class);

    }
}
