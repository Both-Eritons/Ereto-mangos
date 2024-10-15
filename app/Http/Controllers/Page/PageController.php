<?php

namespace App\Http\Controllers\Page;

use App\Actions\Page\AllPagesByChapterId as PagesByChapterID;
use App\Http\Controllers\PageBase;
use Illuminate\Http\Request;

class PageController extends PageBase
{
    public function __construct(){}

    public function pagesByChapterID(Request $request, PagesByChapterID $action)
    {
        $data = $action->execute((int) $request->chapter_id);
        return $this->respondPage('Pagina Encontrada',200, $data);
    }
}
