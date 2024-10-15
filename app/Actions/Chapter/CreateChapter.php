<?php

namespace App\Actions\Chapter;

use App\Managements\Manga\MangaManagement;
use App\Repositories\Chapter\ChapterRepository;
use App\Repositories\Manga\MangaRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class CreateChapter
{

    public function __construct(
        private ChapterRepository $chapter,
        private MangaRepository $manga,
        private MangaManagement $file,
    ) {}

    public function execute(array $data)
    {
        $images = $data['images'];
        $slug = $data['slug'];
        $chapterNumber = $data['chapter'];

        $exists = $this->file->findManga($slug);
        if (!$exists) {
            $this->file->CreateMangaFolder($slug);
            $this->file->CreateChapter($slug, $chapterNumber);
        }

        $manga = $this->manga->findMangaBySlug($slug);
        $this->chapter->create([
            'manga_id' => $manga->id,
            'title' => '',
            'number' => $chapterNumber,
        ]);

        /** @var UploadedFile $image */
        foreach ($images as $image) {
            $this->file->saveChapter($slug, $chapterNumber, $image);
        }

        return ['message' => 'Capitulo Updado com Sucesso!'];
    }
}
