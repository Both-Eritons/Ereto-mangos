<?php

namespace App\Managements\Manga;

use Illuminate\Support\Facades\Storage;

class MangaManagement {

    private $disk;
    public function __construct(
        string $driver = 'local',
        string $path = ''
    )
    {
        $this->disk = Storage::build([
            'driver' => $driver,
            'root' => $path
        ]);
    }

    public function CreateMangaFolder(string $title): bool
    {
        return $this->disk->makeDirectory($title);
    }

}
