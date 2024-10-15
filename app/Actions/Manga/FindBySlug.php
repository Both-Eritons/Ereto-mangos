<?php

namespace App\Actions\Manga;

use App\Exceptions\Manga\MangaNotExistsException;
use App\Repositories\Manga\MangaRepository;

class FindBySlug
{
    public function __construct(
        private MangaRepository $manga
    ){}

    public function execute(string $slug)
    {
        $manga = $this->manga->findMangaBySlug($slug);
        if(!$manga) throw new MangaNotExistsException('Sem Resultados');
        return $manga;
    }
}
