<?php

namespace App\Actions\Chapter;

use App\Repositories\Chapter\ChapterRepository;

class CreateChapter
{

    public function __construct(private ChapterRepository $chapter)
    {
    }

    public function execute(array $data) {
        //$chapter = $this->chapter->create($data);

    }
}