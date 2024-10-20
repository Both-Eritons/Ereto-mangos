<?php

namespace App\Http\Controllers\Chapter;

use App\Actions\Chapter\CreateChapter;
use App\Actions\Chapter\GetChaptersByMangaId;
use App\Actions\Chapter\GetChaptersByMangaSlug;
use App\Actions\Chapter\GetChaptersByMangaTitle;
use App\Http\Controllers\ChapterBase;
use App\Http\Requests\Chapter\UploadChapterRequest as UploadRequest;
use Illuminate\Http\Request;

class ChapterController extends ChapterBase
{
    public function postChapter(
        UploadRequest $req,
        CreateChapter $action)
    {
        $array = [
            'images' => $req->validated()['images'],
            'slug' => $req->slug,
            'chapter' => $req->chapter_number,
        ];

        $result = $action->execute($array);
        return response($result, 201);
    }

    public function getChaptersByMangaId(
        Request $req,
        GetChaptersByMangaId $action)
    {
        $result = $action->execute(['id' => $req->id]);
        return response([$result]);
    }

    public function getChaptersByMangaSlug(
        Request $req,
        GetChaptersByMangaSlug $action)
    {
        $result = $action->execute(['slug' => $req->slug]);
        return response([$result]);
    }

    public function getChaptersByMangaTitle(
        Request $req,
        GetChaptersByMangaTitle $action)
    {
        $result = $action->execute(['title' => $req->title]);
        return response($result);
    }
}
