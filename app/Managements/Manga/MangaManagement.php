<?php

namespace App\Managements\Manga;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MangaManagement {

    private $disk, $path;
    public function __construct(
        string $path = 'mangas/'
    )
    {
        $this->path = $path;
        /*$this->disk = Storage::build([
            'driver' => 'public',
            'root' => $path
        ]);*/
        $this->disk = Storage::disk('public');
    }

    public function CreateMangaFolder(string $dir): bool
    {
        return $this->disk->makeDirectory($this->path.Str::slug($dir));
    }

    public function deleteMangaFolder(string $dir): bool
    {
        return $this->disk->deleteDirectory($this->path.Str::slug($dir));
    }

    public function findManga(string $dir): bool
    {
        return $this->disk->exists($this->path.Str::slug($dir));
    }

    public function CreateChapter(string $slug, string $chapter): bool
    {
        $manga = Str::slug($slug);
        $dir = Str::slug($chapter);
        return $this->disk->makeDirectory(
            $this->path."$manga/chapters/$chapter"
        );
    }
}
