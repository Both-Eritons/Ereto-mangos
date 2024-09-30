<?php

namespace App\Repositories\Manga;

use App\Models\Manga\Manga;
use App\Repositories\Manga\Contract\MangaContract;

class MangaRepositoryi implements MangaContract{
    public function __construct(private Manga $manga)
    {

    }


}
