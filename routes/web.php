<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/location', function () {
    return view('location');
})->name('location');

Route::get('/motor', function () {
    return view('motor');
})->name('motor');
