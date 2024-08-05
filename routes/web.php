<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\SewaController;

Route::resource('kwitansi', KwitansiController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('/pengguna',UserController::class);
Route::resource('/penyewas',PenyewaController::class);
Route::resource('/sewa',SewaController::class);


Route::get('/', function () {
    return view('welcome');
});
