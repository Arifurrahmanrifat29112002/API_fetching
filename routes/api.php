<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\fetchingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(AuthenticationController::class)->group(function () {
    //login
    Route::post('/login','api_login');
});

Route::controller(fetchingController::class)->group(function () {
    Route::get('/fetching/data','fetchingData')->name('fething.data');
    Route::get('/fetching/data/{id}','show')->name('single.data');
    Route::post('/create/product','store')->name('product.create');
});