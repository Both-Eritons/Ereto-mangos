<?php

namespace App\Repositories\Chapter;

use App\Models\Manga\Chapter;
use App\Repositories\Chapter\Contract\ChapterContract;

class ChapterRepository implements ChapterContract
{

    public function __construct(private Chapter $chapter)
    {

    }

    public function create(array $array): ?Chapter
    {
        return $this->chapter::create($array);
    }

    public function deleteById(int $id): ?Chapter
    {
        return $this->chapter::where('id', $id)->delete();
    }

    public function findById(int $id): ?Chapter
    {
        return $this->chapter::find($id);
    }
}
