<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
    ];

    public function manga_categories(): HasOne {
        return $this->hasOne(MangaCategory::class);
    }
}
