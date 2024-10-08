<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserGearController;
use App\Http\Controllers\UserPumpController;
use App\Http\Controllers\AdminPumpController;
use App\Http\Controllers\UserMotorController;
use App\Http\Controllers\AdminMotorController;
use App\Http\Controllers\AdminGearboxController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\AdminLocationController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('location', AdminLocationController::class);
    Route::resource('motor', AdminMotorController::class);
    Route::resource('pump', AdminPumpController::class);
    Route::resource('gear', AdminGearboxController::class);
    Route::resource('profile', AdminProfileController::class);
    Route::put('/profile/{id}', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/{id}/password', [AdminProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});




Route::get('/user-loc', [UserLocationController::class, 'index'])->name('user-location.index');
Route::get('/user-motor', [UserMotorController::class, 'index'])->name('user-motor.index');
Route::get('/user-pump', [UserPumpController::class, 'index'])->name('user-pump.index');
Route::get('/user-gear', [UserGearController::class, 'index'])->name('user-gear.index');