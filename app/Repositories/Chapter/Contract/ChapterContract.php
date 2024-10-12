<?php

namespace App\Repositories\Chapter\Contract;

use App\Models\Manga\Chapter;

interface ChapterContract {
    public function create(array $array): ?Chapter;
    public function deleteById(int $int): ?Chapter;
    public function findById(int $int): ?Chapter;
}
