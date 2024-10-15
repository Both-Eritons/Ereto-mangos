<?php

namespace App\Repositories\Manga;

use App\Models\Manga\Manga;
use App\Repositories\Manga\Contract\MangaContract;
use Illuminate\Database\Eloquent\Collection;

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

    public function findMangasByAuthor(string $author): ?Collection
    {
        return $this->manga::where('author', $author)->get();
    }

    public function findMangasByType(string $type): ?Collection
    {
        return $this->manga::where('type', $type)->get();
    }

    public function setMangaType(int $id, string $type): ?bool
    {
        return $this->manga::where('id', $id)
                    ->update(['type' => $type]);
    }

    public function setMangaTitle(int $id, string $title): ?bool
    {
        return $this->manga::where('id', $id)
                    ->update(['title' => $title]);

    }

    public function setMangaAuthor(int $id, string $author): ?bool
    {
        return $this->manga::where('id', $id)
                    ->update(['author' => $author]);

    }

    public function setMangaSinopse(int $id, string $sinopse): ?bool
    {
        return $this->manga::where('id', $id)
                    ->update(['sinopse' => $sinopse]);

    }

    public function deleteMangaById(int $id): bool
    {
        return $this->manga::where('id', $id)->delete();
    }

    public function findMangaBySlug(string $slug): ?Manga
    {
        return $this->manga::where('slug', $slug)->first();
    }

    public function searchMangaByTitle(string $title): ?Manga
    {
        return $this->manga::where('title', $title)->first();
    }
}
