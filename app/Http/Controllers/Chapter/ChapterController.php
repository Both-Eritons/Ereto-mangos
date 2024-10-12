<?php

namespace App\Http\Controllers\Chapter;

use App\Actions\Chapter\CreateChapter;
use App\Http\Controllers\ChapterBase;
use App\Http\Requests\Chapter\UploadChapterRequest as Request;

class ChapterController extends ChapterBase
{

    public function postChapter(Request $req, CreateChapter $action)
    {
        foreach ($req->file('images') as $imageFile)
        {

        }
        return response('...');
    }

}
