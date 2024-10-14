<?php

namespace App\Actions\Chapter;

use App\Repositories\Chapter\ChapterRepository;
use Illuminate\Http\UploadedFile;

class CreateChapter
{

    public function __construct(
        private ChapterRepository $chapter
    ){}

    public function execute(array $data)
    {
        $images = $data['images'];

        /** @var UploadedFile $image */
        foreach($images as $image) {

        }
    }
}
