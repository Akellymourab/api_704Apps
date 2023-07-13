<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use Illuminate\Http\Request;
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

Route::get('login', [LoginController::class, 'login'])->name('login');


Route::group(['prefix' => 'auth'], function () {
    Route::group(['as' => 'auth'], function () {
        Route::post('register', [LoginController::class, 'register']);
        Route::post('login', [LoginController::class, 'login']);
        
    });
});


Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::resource('driver',DriversController::class);
    Route::post('driver/{id}',[DriversController::class, 'update']);

    Route::resource('car',CarsController::class);
    Route::resource('image', ImagesController::class);
});

//Route::patch('driver', [DriversController::class, 'update']);
//Route::patch('car', [DriversController::class, 'update']);