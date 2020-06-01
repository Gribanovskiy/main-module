<?php

namespace B2B\Console\Commands;

use Illuminate\Console\Command;

class ModuleDiscoverCommand extends Command
{
    protected $signature = 'b2b:module:discover';

    public function handle(): void
    {
        dd(123);
    }
}