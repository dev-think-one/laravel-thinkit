<?php

namespace ThinKit;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/thinkit.php' => config_path('thinkit.php'),
            ], 'config');


            $this->commands([
                //
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/thinkit.php', 'thinkit');
    }

    protected function registerRoutes()
    {
        if (TooltKit::$registersRoutes) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }
    }
}
