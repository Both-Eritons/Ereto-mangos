<?php

namespace App\Repositories\Manga\Contract;

interface MangaContract {
    public function createManga(array $data);
    public function findMangaByTitle(string $title);
    public function findMangaById(int $id);
    public function findMangasByAuthor(string $author);
    public function findMangasByType(string $type);
}
