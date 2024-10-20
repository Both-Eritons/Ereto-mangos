<?php
namespace App\Actions\Chapter;

use App\Repositories\Chapter\ChapterRepository;

class GetChaptersByMangaId
{
    public function __construct(
        private ChapterRepository $chapter,
    ){}

    public function execute(array $data)
    {

    }
}
