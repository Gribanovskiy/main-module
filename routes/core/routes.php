<?php

use Illuminate\Support\Facades\Route;
use B2B\Module\Http\Controllers\CoreController;

Route::get('/core', sprintf('%s@index', CoreController::class));
