<?php

use App\Http\Controllers\AdminGearboxController;
use App\Http\Controllers\AdminLocationController;
use App\Http\Controllers\AdminMotorController;
use App\Http\Controllers\AdminPumpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('location',AdminLocationController::class);
Route::resource('motor', AdminMotorController::class);
Route::resource('pump', AdminPumpController::class);
Route::resource('gear', AdminGearboxController::class);

Route::get('/profile', function () {
    return view('profile');
})->name('profile');