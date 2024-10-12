<?php

namespace App\Managements\Manga;

use Illuminate\Support\Facades\Storage;

class MangaManagement {

    private $disk;
    public function __construct(
        string $path = 'mangas'
    )
    {
        $this->disk = Storage::build([
            'driver' => 'local',
            'root' => $path
        ]);
    }

    public function CreateMangaFolder(string $dir): bool
    {
        return $this->disk->makeDirectory($dir);
    }

    public function deleteMangaFolder(string $dir): bool
    {
        return $this->disk->deleteDirectory($dir);
    }

    public function findMangaById(string $dir): bool
    {
        return $this->disk->exists($dir);
    }
}
