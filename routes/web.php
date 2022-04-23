<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FaqsController;

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/banner', [App\Http\Controllers\HomeController::class, 'index'])->name('banner')->middleware('auth');
Route::get('/store', [App\Http\Controllers\HomeController::class, 'index'])->name('store')->middleware('auth');
Route::get('/faqs', [App\Http\Controllers\HomeController::class, 'index'])->name('faqs')->middleware('auth');
Route::resource('/testimonial', TestimonialController::class);
Route::resource('store_description', StoreController::class);
Route::resource('faq', FaqsController::class);

Route::get('/{any}', function () {
    return view('auth.login');
})->where('any','.*');



