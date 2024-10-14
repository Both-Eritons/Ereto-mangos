<?php

namespace App\Actions\Chapter;

use App\Managements\Manga\MangaManagement;
use App\Repositories\Chapter\ChapterRepository;
use Illuminate\Http\UploadedFile;

class CreateChapter
{

    public function __construct(
        private ChapterRepository $chapter,
        private MangaManagement $file,
    ){}

    public function execute(array $data)
    {
        var_dump($data);
        //mangas/Titulo/chapters/{chapter}
        $images = $data['images'];

        /** @var UploadedFile $image */
       /* foreach($images as $image) {
            $this->file->findManga('');
        }*/
    }
}
