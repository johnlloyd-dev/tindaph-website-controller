<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StoreController;

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/banner', [App\Http\Controllers\HomeController::class, 'index'])->name('banner')->middleware('auth');
Route::get('/store', [App\Http\Controllers\HomeController::class, 'index'])->name('store')->middleware('auth');

Route::get('/{any}', function () {
    return view('auth.login');
})->where('any','.*');


