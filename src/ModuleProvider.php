<?php

namespace B2B;

use B2B\Console\Commands\ModuleDiscoverCommand;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/b2b-modules.php' => config_path('b2b-modules.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                ModuleDiscoverCommand::class,
            ]);
        }
    }
}