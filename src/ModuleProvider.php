<?php

namespace B2B;

use B2B\Console\Commands\ModuleDiscoverCommand;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModuleDiscoverCommand::class,
            ]);
        }
    }
}