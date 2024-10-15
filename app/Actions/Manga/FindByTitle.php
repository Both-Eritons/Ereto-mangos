<?php

namespace App\Actions\Manga;

use App\Exceptions\Manga\MangaNotExistsException;
use App\Repositories\Manga\MangaRepository;

class FindByTitle
{
    public function __construct(
        private MangaRepository $manga
    ){}

    public function execute(string $title)
    {
        $manga = $this->manga->findMangaByTitle($title);

        if(!$manga) throw new MangaNotExistsException('Sem Resultados');

        return $manga;
    }
}
