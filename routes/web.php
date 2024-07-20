<?php

use App\Http\Controllers\AdminLocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('location',AdminLocationController::class);

Route::get('/motor', function () {
    return view('motor');
})->name('motor');

Route::get('/pump', function () {
    return view('pump');
})->name('pump');

Route::get('/gear', function () {
    return view('gear');
})->name('gear');
