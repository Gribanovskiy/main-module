<?php

namespace B2B\Module\Http\Controllers;

class CoreController
{
    public function index()
    {
        return view('core.index', compact(config('core.testKey')));
    }
}