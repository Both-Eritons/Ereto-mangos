<?php

namespace App\Observers\Manga;

use App\Managements\Manga\MangaManagement;
use App\Models\Manga\Manga;
use Illuminate\Support\Str;

class MangaObserver
{
    public function __construct(
        private MangaManagement $file
    ){}
    /**
     * Handle the Manga "created" event.
     */
    public function created(Manga $manga): void
    {
        $manga->slug = Str::slug($manga->slug);
    }

    /**
     * Handle the Manga "updated" event.
     */
    public function updated(Manga $manga): void
    {
        $manga->slug = Str::slug($manga->slug);
    }

    /**
     * Handle the Manga "deleted" event.
     */
    public function deleted(Manga $manga): void
    {
        $this->file->deleteMangaFolder($manga->slug);
    }

    /**
     * Handle the Manga "restored" event.
     */
    public function restored(Manga $manga): void
    {
        //
    }

    /**
     * Handle the Manga "force deleted" event.
     */
    public function forceDeleted(Manga $manga): void
    {
        $this->file->deleteMangaFolder($manga->slug);
    }
}
