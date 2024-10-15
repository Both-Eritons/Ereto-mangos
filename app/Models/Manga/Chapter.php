<?php

namespace App\Models\Manga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Manga\Page;
class Chapter extends Model
{
    use HasFactory;

    public $fillable = [
        'manga_id',
        'title',
        'number',
    ];

    public function pages(): HasMany {
        return $this->hasMany(Page::class);
    }
}
