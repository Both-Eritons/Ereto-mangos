<?php

namespace App\Http\Controllers\Chapter;

use App\Actions\Chapter\CreateChapter;
use App\Http\Controllers\ChapterBase;
//use App\Http\Requests\Chapter\UploadChapterRequest as Request;
use App\Models\Manga\Chapter;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChapterController extends ChapterBase
{

    public function __construct() {}
    public function postChapter(Request $req)
    {
        $chap = Chapter::find(1);
        if($chap) {
            var_dump($chap);die;
        }
        return response('...');
    }
}
