<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function () {
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('faqs', FaqsController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('store', StoreController::class);
    Route::resource('dasboard', DashboardController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

