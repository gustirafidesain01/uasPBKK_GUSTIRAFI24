<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

Route::resource('invoices', InvoiceController::class);

Route::get('/', function () {
    return view('welcome');
});
