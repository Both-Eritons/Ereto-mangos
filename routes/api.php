<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function() {
    Route::post('login', []);
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
