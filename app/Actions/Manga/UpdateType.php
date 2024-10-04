<?php

namespace App\Actions\Manga;

use App\Exceptions\Manga\MangaNotExistsException;
use App\Http\Requests\Manga\UpdateMangaRequest as Request;
use App\Repositories\Manga\MangaRepository;

class UpdateType {


    public function __construct(private MangaRepository $manga)
    {
    }

    public function execute(Request $req) {
        $data = $req->validated();
        $id = $data['id'];
        $value = $data['new_value'];


        $mangaExists = $this->manga->findMangaById($id);

        if(!$mangaExists)  {
            throw new MangaNotExistsException();
        }

        $manga = $this->manga->setMangaType($id, $value);

        return $manga;

    }
}
