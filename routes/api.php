<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Chapter\ChapterController;
use App\Http\Controllers\Manga\MangaController;
use App\Http\Controllers\Page\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
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
], function () {
    Route::post('create', [MangaController::class, 'create'])
        ->name('manga.create')->middleware('permission:create manga');
    Route::delete('delete/{id}', [MangaController::class, 'deleteById'])
        ->name('manga.delete')->middleware('permission: delete manga');

    Route::get('find/id/{id}', [MangaController::class, 'findById'])
        ->name('manga.find.id');

    Route::get('find/type/{type}', [MangaController::class, 'findByTypes'])
        ->name('manga.find.type');

    Route::get(
        'find/author/{author}',
        [MangaController::class, 'findByAuthor']
    )
        ->name('manga.find.author');

    Route::get(
        'find/slug/{slug}',
        [MangaController::class, 'findBySlug']
    )
        ->name('manga.find.slug');

    Route::get(
        'find/title/{title}',
        [MangaController::class, 'findByTitle']
    )
        ->name('manga.find.title');

    Route::group(['middleware' => 'permission:update manga'],
        function() {
            Route::patch('update/title',
                [MangaController::class, 'updateTitle'])
                ->name('manga.update.title');

            Route::patch('update/author',
                [MangaController::class, 'updateAuthor'])
                ->name('manga.update.author');

            Route::patch('update/type',
                [MangaController::class, 'updateType'])
                ->name('manga.update.type');

            Route::patch('update/sinopse',
                [MangaController::class, 'updateSinopse'])
                ->name('manga.update.sinopse');
    });
    Route::group(['prefix' => 'chapter'], function () {
        Route::post(
            'upload/{slug}/{chapter_number}',
            [ChapterController::class, 'postChapter']
        )
            ->name('chapter.upload');
    });

    Route::group(['prefix' => 'page'], function () {
        Route::get('find/chapter_id/{id}', [PageController::class, 'pagesByChapterID'])
            ->name('page.all_pages_by_chapter_id');
    });
});
