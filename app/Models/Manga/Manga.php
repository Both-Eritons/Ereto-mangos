<?php

namespace App\Models\Manga;

use App\Models\Category\MangaCategory;
use App\Models\Favorite\Favorite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Manga extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'slug',
        'type',
        'author',
        'sinopse',
        'cover_image',
    ];

    public function favorites(): HasOne {
        return $this->hasOne(Favorite::class);
    }

    public function chapters(): HasMany {
        return $this->hasMany(Chapter::class);
    }

    public function categories(): BelongsTo {
        return $this->belongsTo(MangaCategory::class);
    }
}
