<?php

namespace App\Actions\Manga;

use App\Managements\Manga\MangaManagement;
use App\Repositories\Manga\MangaRepository;

class CreateManga
{

    public function __construct(
        private MangaRepository $manga,
        private MangaManagement $mangaManagement
    ){}

    public function execute(array $data)
    {
        $manga = $this->manga->createManga($data);
        $this->mangaManagement->CreateMangaFolder($data['title']);
        return $manga;
    }

}
