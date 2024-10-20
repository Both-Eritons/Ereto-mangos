<?php
namespace App\Actions\Chapter;

use App\Exceptions\Chapter\ChapterNotFoundException;
use App\Exceptions\Manga\MangaNotExistsException;
use App\Repositories\Chapter\ChapterRepository;
use App\Repositories\Manga\MangaRepository;

class GetChaptersByMangaId
{
    public function __construct(
        private ChapterRepository $chapter,
        private MangaRepository $manga,
    ){}

    public function execute(array $data)
    {
        $manga = $this->manga->findMangaById($data['id']);
        if(!$manga) throw new MangaNotExistsException();
        $manga = $this->chapter->getChaptersByMangaId($data['id']);
        if(!$manga) throw new ChapterNotFoundException();

        return $manga;
    }
}
