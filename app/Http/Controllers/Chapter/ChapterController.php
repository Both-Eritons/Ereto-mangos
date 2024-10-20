<?php

namespace App\Http\Controllers\Chapter;

use App\Actions\Chapter\CreateChapter;
use App\Http\Controllers\ChapterBase;
use App\Http\Requests\Chapter\UploadChapterRequest as Request;
use App\Models\Manga\Chapter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChapterController extends ChapterBase
{
    public function postChapter(Request $req, CreateChapter $action)
    {
        $array = [
            'images' => $req->validated()['images'],
            'slug' => $req->slug,
            'chapter' => $req->chapter_number,
        ];

        $result = $action->execute($array);
        return response($result, 201);
    }

    public function getChaptersByMangaId(Request $req)
    {

    }

    public function getChaptersByMangaSlug(Request $req)
    {

    }

    public function getChaptersByMangaTitle(Request $req)
    {

    }
}
