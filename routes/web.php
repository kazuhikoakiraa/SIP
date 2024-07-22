<?php

use App\Http\Controllers\AdminLocationController;
use App\Http\Controllers\AdminMotorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('location',AdminLocationController::class);
Route::resource('motor', AdminMotorController::class);

Route::get('/pump', function () {
    return view('pump');
})->name('pump');

Route::get('/gear', function () {
    return view('gear');
})->name('gear');
