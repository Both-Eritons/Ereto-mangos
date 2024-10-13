<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Chapter\ChapterController;
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
    Route::delete('delete/{id}', [MangaController::class, 'deleteById'])
        ->name('manga.delete');

    Route::get('find/id/{id}', [MangaController::class, 'findById'])
        ->name('manga.find.id');

    Route::get('find/type/{type}',[MangaController::class,'findByTypes'])
        ->name('manga.find.type');

    Route::get('find/author/{author}',
        [MangaController::class,'findByAuthor'])
        ->name('manga.find.author');

    Route::post('update/title', [MangaController::class,'updateTitle'])
        ->name('manga.update.title');
    Route::post('update/author', [MangaController::class,'updateAuthor'])
        ->name('manga.update.author');

    Route::post('update/type', [MangaController::class, 'updateType'])
        ->name('manga.update.type');
    Route::post('update/sinopse',[MangaController::class,'updateSinopse'])
        ->name('manga.update.sinopse');

    Route::post('chapter', [ChapterController::class, 'postChapter'])
        ->name('chapter.create')
        ->middleware('UploadMiddleware');

});
