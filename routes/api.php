<?php

use App\Http\Controllers\CarsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\ImagesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('driver',DriversController::class);
Route::resource('car',CarsController::class);
Route::resource('image', ImagesController::class);

Route::group(['prefix' => 'auth'], function () {
    Route::group(['as' => 'auth'], function () {
        Route::post('register',[LoginController::class, 'register']);
        Route::post('login',[LoginController::class, 'login']);
    });
});