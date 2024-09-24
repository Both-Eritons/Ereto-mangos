<?php

namespace App\Models\Category;

use App\Models\Manga\Manga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MangaCategory extends Model
{
    use HasFactory;

    public $fillable = [
        'manga_id',
        'category_id',
    ];


    public function categories(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function mangas(): HasMany{
        return $this->hasMany(Manga::class);
    }
}
