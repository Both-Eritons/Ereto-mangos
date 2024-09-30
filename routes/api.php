<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Manga\MangaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function() {
    Route::post('login', [AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('register', [AuthController::class, 'register'])
        ->name('auth.register');

    Route::post('logout', [AuthController::class, 'logout'])
        ->name('auth.logout');

    Route::post('myself', [AuthController::class, 'myself'])
        ->name('auth.myself');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'manga'
], function() {
    Route::post('create', [MangaController::class, 'create'])
        ->name('manga.create');
    Route::get('find/id/{id}', [MangaController::class, 'findById'])
        ->name('manga.find.id');

    Route::get('find/type/{type}',[MangaController::class,'findByType'])
        ->name('manga.find.type');

    Route::post('logout', []);
    Route::post('myself', []);
});
