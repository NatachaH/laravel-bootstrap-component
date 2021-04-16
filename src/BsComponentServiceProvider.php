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
          __DIR__.'/../config/bs-component.php' => config_path('bs-component.php')
      ], 'bs-component');

      // VIEWS
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'bs-component');

      // TRANSLATIONS
      $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'bs-component');

      // BLADES
      Blade::component('bs-input', \Nh\BsComponent\View\Components\Form\Input::class);
      Blade::component('bs-textarea', \Nh\BsComponent\View\Components\Form\Textarea::class);
      Blade::component('bs-check-list', \Nh\BsComponent\View\Components\Form\CheckList::class);
      Blade::component('bs-select', \Nh\BsComponent\View\Components\Form\Select::class);
      Blade::component('bs-datalist', \Nh\BsComponent\View\Components\Form\Datalist::class);
      Blade::component('bs-input-file', \Nh\BsComponent\View\Components\Form\InputFile::class);
      Blade::component('bs-datepicker', \Nh\BsComponent\View\Components\Form\Datepicker::class);
      Blade::component('bs-color', \Nh\BsComponent\View\Components\Form\Color::class);

      Blade::component('bs-check', \Nh\BsComponent\View\Components\Form\Check::class);
      Blade::component('bs-dynamic', \Nh\BsComponent\View\Components\Form\Dynamic::class);
      Blade::component('bs-editor', \Nh\BsComponent\View\Components\Form\Editor::class);

      Blade::component('bs-alert', \Nh\BsComponent\View\Components\Alert::class);
      Blade::component('bs-blockquote', \Nh\BsComponent\View\Components\Blockquote::class);
      Blade::component('bs-breadcrumb', \Nh\BsComponent\View\Components\Breadcrumb::class);
      Blade::component('bs-card', \Nh\BsComponent\View\Components\Card::class);
      Blade::component('bs-figure', \Nh\BsComponent\View\Components\Figure::class);
      Blade::component('bs-modal', \Nh\BsComponent\View\Components\Modal::class);
      Blade::component('bs-modal-confirm', \Nh\BsComponent\View\Components\ModalConfirm::class);
      Blade::component('bs-loading', \Nh\BsComponent\View\Components\Loading::class);
      Blade::component('bs-progress', \Nh\BsComponent\View\Components\Progress::class);
      Blade::component('bs-toast', \Nh\BsComponent\View\Components\Toast::class);

    }
}
