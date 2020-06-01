<?php


namespace B2B\Core;

use B2B\Contracts\ModuleIntarface;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider implements ModuleIntarface
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/core/config.php' => config_path('core/config.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../../routes/core/routes.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/core/views', 'core');
    }
}