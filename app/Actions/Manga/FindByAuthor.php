<?php

namespace App\Actions\Manga;

use App\Exceptions\Manga\MangaNotExistsException;
use App\Repositories\Manga\MangaRepository;

class FindByAuthor
{
    public function __construct(
        private MangaRepository $manga
    ){}

    public function execute(string $author)
    {
        $manga = $this->manga->findMangasByAuthor($author);

        if(!count($manga))
            throw new MangaNotExistsException('Sem Resultados');

        return $manga;
    }
}
