<?php

namespace App\Repositories\Chapter;

use App\Models\Manga\Chapter;
use App\Repositories\Chapter\Contract\ChapterContract;
use Illuminate\Database\Eloquent\Collection;

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

    public function getChaptersByMangaId(int $id): ?Collection
    {
        return $this->chapter::where('manga_id', $id)->get();
    }

    public function getChaptersByMangaSlug(string $slug): ?Collection
    {
        return $this->chapter::where('manga_id', $slug)->get();
    }

    public function getChaptersByMangaTitle(string $title): ?Collection
    {
        return $this->chapter::where('manga_id', $title)->get();
    }
}
