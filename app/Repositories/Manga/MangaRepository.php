<?php

namespace App\Repositories\Manga;

use App\Models\Manga\Manga;
use App\Repositories\Manga\Contract\MangaContract;

class MangaRepository implements MangaContract{
    public function __construct(private Manga $manga)
    {

    }

    public function createManga(array $data): ?Manga
    {
        return $this->manga::create($data);
    }

    public function findMangaById(int $id): ?Manga{
        return $this->manga::find($id);
    }

    public function findMangaByTitle(string $title): ?Manga
    {
        return $this->manga::where('title', $title)->first();
    }

    public function findMangasByAuthor(string $author): ?Manga
    {
        return $this->manga::where('author', $author)->get();
    }

    public function findMangasByType(string $type): ?Manga
    {
        return $this->manga::where('type', $type)->get();
    }

    public function setMangaType(int $id, string $type): ?Manga
    {
        return $this->manga::where('id', $id)
                    ->update(['type' => $type]);
    }

    public function setMangaTitle(int $id, string $title): ?Manga
    {
        return $this->manga::where('id', $id)
                    ->update(['title' => $title]);

    }

    public function setMangaAuthor(int $id, string $author): ?Manga
    {
        return $this->manga::where('id', $id)
                    ->update(['author' => $author]);

    }

    public function setMangaSinopse(int $id, string $sinopse): ?Manga
    {
        return $this->manga::where('id', $id)
                    ->update(['sinopse' => $sinopse]);

    }

    public function deleteMangaById(int $id): bool
    {
        $manga = $this->manga::where('id', $id)->delete();

        return $manga;
    }

}
