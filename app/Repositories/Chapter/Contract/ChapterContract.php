<?php

namespace App\Repositories\Chapter\Contract;

use App\Models\Manga\Chapter;
use Illuminate\Database\Eloquent\Collection;

interface ChapterContract {
    public function create(array $array): ?Chapter;
    public function deleteById(int $int): ?Chapter;
    public function findById(int $int): ?Chapter;
    public function getChaptersByMangaSlug(string $slug): ?Collection;
    public function getChaptersByMangaTitle(string $title): ?Collection;
    public function getChaptersByMangaId(int $id): ?Collection;
}
