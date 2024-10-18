<?php

namespace App\Actions\Chapter;

use App\Exceptions\Manga\SlugNotFoundException;
use App\Managements\Manga\MangaManagement;
use App\Repositories\Chapter\ChapterRepository;
use App\Repositories\Manga\MangaRepository;
use App\Repositories\Page\PageRepository;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class CreateChapter
{

    public function __construct(
        private ChapterRepository $chapter,
        private MangaRepository $manga,
        private PageRepository $page,
        private MangaManagement $file,
    ) {}

    public function execute(array $data)
    {
        $images = $data['images'];
        $slug = $data['slug'];
        $chapterNumber = $data['chapter'];

        $manga = $this->manga->findMangaBySlug($slug);
        if(!$manga)
            throw new SlugNotFoundException();

        $exists = $this->file->findManga($slug);
        if (!$exists && $manga) {
            $this->file->CreateMangaFolder($slug);
            $this->file->CreateChapter($slug, $chapterNumber);
        }

        $chapter = $this->chapter->create([
                'manga_id' => $manga->id,
                'title' => '',
                'number' => $chapterNumber,
            ]);

        /** @var UploadedFile $image */
        foreach ($images as $image) {
            $ext = '.'.$image->extension();
            $file = $image->getClientOriginalName();
            $pageNumber = Str::replace($ext, '', $file);

            $this->file->saveChapter($slug, $chapterNumber, $image);
            $this->page->create([
                'chapter_id' => $chapter->id,
                'page_number' => (int) $pageNumber,
                'image_url' => $this->file->getPagesPath($slug, $chapterNumber).$file,
            ]);
        }

        return ['message' => 'Capitulo Updado com Sucesso!'];
    }
}
