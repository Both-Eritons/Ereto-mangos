<?php

namespace App\Actions\Manga;

use App\Exceptions\Manga\MangaNotExistsException;
use App\Repositories\Manga\MangaRepository;

class UpdateSinopse
{
    public function __construct(
        private MangaRepository $manga
    ){}

    public function execute(array $data)
    {
        $id = $data['id'];
        $value = $data['new_value'];
        $mangaExists = $this->manga->findMangaById($id);

        if(!$mangaExists)  {
            throw new MangaNotExistsException();
        }

        $manga = $this->manga->setMangaSinopse($id, $value);
        return $manga;
    }
}
