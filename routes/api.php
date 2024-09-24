<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function() {
    Route::post('login', [AuthController::class, 'login'])
        ->name('auth.login');
    Route::post('register', []);
    Route::post('logout', []);
    Route::get('myself', []);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'sla'
], function() {
    Route::post('login', []);
    Route::post('register', []);
    Route::post('logout', []);
    Route::post('myself', []);
});
