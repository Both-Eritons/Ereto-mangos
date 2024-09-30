<?php

namespace App\Repositories\Manga;

use App\Models\Manga\Manga;
use App\Repositories\Manga\Contract\MangaContract;

class MangaRepositoryi implements MangaContract{
    public function __construct(private Manga $manga)
    {

    }

    public function createManga(array $data)
    {
        return $this->manga::create($data);
    }

    public function findMangaById(int $id){
        return $this->manga::find($id);
    }

    public function findMangaByTitle(string $title)
    {
        return $this->manga::where('title', $title)->first();
    }

    public function findMangasByAuthor(string $author)
    {
        return $this->manga::where('author', $author);
    }
}
