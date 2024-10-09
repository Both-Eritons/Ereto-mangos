<?php
declare(strict_types=1);

namespace App\Actions\Manga;

use App\Exceptions\Manga\DeleteMangaException;
use App\Exceptions\Manga\MangaNotExistsException;
use App\Repositories\Manga\MangaRepository;

class DeleteMangaById
{

    public function __construct(private MangaRepository $manga)
    {}


    public function execute(int $id): array
    {
        $manga = $this->manga->findMangaById($id);

        if(!$manga) throw new MangaNotExistsException();

        $manga = $this->manga->deleteMangaById($id);

        if(!$manga) throw new DeleteMangaException();

        return ['message' => 'Manga Deletado com Sucesso!'];
    }

}
