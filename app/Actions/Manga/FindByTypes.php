<?php

namespace App\Actions\Manga;

use App\Enums\Manga\MangaType;
use App\Exceptions\Manga\MangaNotExistsException;
use App\Exceptions\Manga\TypeNotExistsException;
use App\Repositories\Manga\MangaRepository;

class FindByTypes {

    public function __construct(private MangaRepository $manga)
    {

    }

    public function execute(string $type) {
        $typeExists = MangaType::tryFrom($type);

        if(!$typeExists) throw new TypeNotExistsException();

        $result = $this->manga->findMangasByType($type);

        if(!count($result)) throw new MangaNotExistsException();

        return $result;
    }

}
