<?php

namespace App\Actions\Manga;

use App\Repositories\Manga\MangaRepository;

class CreateManga {

    public function __construct(private MangaRepository $manga)
    {

    }

    public function execute(array $data) {
        $manga = $this->manga->createManga($data);
        return $manga;
    }

}
