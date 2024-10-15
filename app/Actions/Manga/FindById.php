<?php

namespace App\Actions\Manga;

use App\Exceptions\Manga\MangaNotExistsException;
use App\Repositories\Manga\MangaRepository;

class FindById
{

    public function __construct(
        private MangaRepository $manga
    ){}

    public function execute(int $id)
    {
        $manga = $this->manga->findMangaById($id);

        if(!$manga) throw new MangaNotExistsException();

        return $manga;
    }

}
