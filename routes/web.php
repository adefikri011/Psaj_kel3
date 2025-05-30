<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;


Route::resource('/' , DashboardController::class);

Route::resource('siswa' , SiswaController::class);

Route::get('/tes', fn() => 'Cek cepat');
