<?php

namespace App\Actions\Manga;

use App\Repositories\Manga\MangaRepository;

class FindById {

    public function __construct(private MangaRepository $manga)
    {

    }

    public function execute(int $id) {
        $manga = $this->manga->findMangaById($id);
        return $manga;
    }

}
