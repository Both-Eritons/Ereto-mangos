<?php

namespace App\Repositories\Manga\Contract;

use App\Models\Manga\Manga;

interface MangaContract {
    public function createManga(array $data): ?Manga;
    public function findMangaByTitle(string $title): ?Manga;
    public function findMangaById(int $id): ?Manga;
    public function findMangasByAuthor(string $author): ?Manga;
    public function findMangasByType(string $type): ?Manga;

    public function setMangaAuthor(int $id, string $author): ?Manga;
    public function setMangaTitle(int $id, string $title): ?Manga;
    public function setMangaType(int $id, string $type): ?Manga;
    public function setMangaSinopse(int $id, string $sinopse): ?Manga;

    public function deleteMangaById(int $id): bool;
}
