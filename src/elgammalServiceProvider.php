<?php namespace eafarris\elgammal;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class elgammalServiceProvider extends ServiceProvider {

    public function boot() { // 
        $this->loadViewsFrom(__DIR__ . '/../views', 'elgammal');
        $this->loadViewsFrom(__DIR__ . '/../views', 'e');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    } // endfunction boot

public function provides() { // 
    return ['elgammal'];
} // endfunction provides

    public function register() { // 
        $this->mergeConfigFrom(__DIR__ . '/../config/elgammal.php', 'elgammal');

        $this->app->singleton('elgammal', function ($app) {
            return new elgammal;
        });
    } // endfunction register()

    public function bootForConsole() { // 
        $this->publishes([
            __DIR__ . '/../config/elgammal.php' => config_path('elgammal.php'),
        ], 'elgammal.config');
    } // endfunction bootForConsole

}