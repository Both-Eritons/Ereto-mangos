<?php

namespace App\Repositories\Manga\Contract;

interface MangaContract {
    public function createManga(array $data);
    public function findMangaByTitle(string $title);
    public function findMangaById(int $id);
    public function findMangasByAuthor(string $author);
    public function findMangasByType(string $type);

    public function setMangaAuthor(int $id, string $author);
    public function setMangaTitle(int $id, string $title);
    public function setMangaType(int $id, string $type);
    public function setMangaSinopse(int $id, string $sinopse);
}
