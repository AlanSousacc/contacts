<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('contacts', ContactController::class)->except('index');
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

Auth::routes();

