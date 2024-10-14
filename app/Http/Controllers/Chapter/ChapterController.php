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

    public function __construct() {}
    public function postChapter(Request $req, CreateChapter $action)
    {
        $action->execute($req->validated());
        return response('...');
    }
}
