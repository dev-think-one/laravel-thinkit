<?php

use Illuminate\Support\Facades\Route;

Route::get(config('thinkit.php.uri'), \ThinKit\Http\Controllers\PhpInfoController::class );
