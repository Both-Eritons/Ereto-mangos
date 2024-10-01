<?php

namespace App\Repositories\Manga;

use App\Models\Manga\Manga;
use App\Repositories\Manga\Contract\MangaContract;

class MangaRepository implements MangaContract{
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
        return $this->manga::where('author', $author)->get();
    }

    public function findMangasByType(string $type)
    {
        return $this->manga::where('type', $type)->get();
    }

    public function setMangaType(int $id, string $type)
    {
        return $this->manga::where('id', $id)
                    ->update(['type' => $type]);
    }

    public function setMangaTitle(int $id, string $title)
    {
        return $this->manga::where('id', $id)
                    ->update(['title' => $title]);

    }

    public function setMangaAuthor(int $id, string $author)
    {
        return $this->manga::where('id', $id)
                    ->update(['author' => $author]);

    }

    public function setMangaSinopse(int $id, string $sinopse)
    {
        return $this->manga::where('id', $id)
                    ->update(['sinopse' => $sinopse]);

    }

}
