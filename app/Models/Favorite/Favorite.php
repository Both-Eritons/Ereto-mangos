<?php

namespace App\Models\Favorite;

use App\Models\Manga\Manga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory;

    public $fillable = [
        "user_id",
        "manga_id",
    ];

    public function mangas(): BelongsTo {
        return $this->belongsTo(Manga::class);
    }
}
