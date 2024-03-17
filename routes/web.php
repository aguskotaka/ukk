<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CSController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',[AuthController::class , 'index']);
Route::post('/login',[AuthController::class , 'login'])->name('login');


Route::group(['middleware'=>'auth'], function(){

    Route::delete('/logout',[AuthController::class , 'logout'])->name('logout');
    Route::get('/dashboard',[DashboardController::class , 'index'])->name('dashboard');

    Route::resource('/register',CSController::class);
});
// d
