<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Mobil', MobilController::class);
