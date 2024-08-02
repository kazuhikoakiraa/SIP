<?php

use App\Http\Controllers\AdminGearboxController;
use App\Http\Controllers\AdminLocationController;
use App\Http\Controllers\AdminMotorController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminPumpController;
use App\Http\Controllers\UserGearController;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\UserMotorController;
use App\Http\Controllers\UserPumpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('location',AdminLocationController::class);
Route::resource('motor', AdminMotorController::class);
Route::resource('pump', AdminPumpController::class);
Route::resource('gear', AdminGearboxController::class);
Route::resource('profile', AdminProfileController::class);
Route::put('/profile/{id}', [AdminProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/{id}/password', [AdminProfileController::class, 'updatePassword'])->name('profile.updatePassword');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/user-loc', [UserLocationController::class, 'index'])->name('user-location.index');
Route::get('/user-motor', [UserMotorController::class, 'index'])->name('user-motor.index');
Route::get('/user-pump', [UserPumpController::class, 'index'])->name('user-pump.index');
Route::get('/user-gear', [UserGearController::class, 'index'])->name('user-gear.index');