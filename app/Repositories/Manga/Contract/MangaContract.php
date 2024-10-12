<?php

namespace App\Repositories\Manga\Contract;

use App\Models\Manga\Manga;
use Illuminate\Database\Eloquent\Collection;

interface MangaContract {
    public function createManga(array $data): ?Manga;
    public function findMangaByTitle(string $title): ?Manga;
    public function findMangaById(int $id): ?Manga;
    public function findMangasByAuthor(string $author): ?Collection;
    public function findMangasByType(string $type): ?Collection;

    public function setMangaAuthor(int $id, string $author): ?bool;
    public function setMangaTitle(int $id, string $title): ?bool;
    public function setMangaType(int $id, string $type): ?bool;
    public function setMangaSinopse(int $id, string $sinopse): ?bool;

    public function deleteMangaById(int $id): bool;
}
