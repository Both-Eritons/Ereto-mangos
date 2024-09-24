<?php

namespace App\Models\Manga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $fillable = [
        'chapter_id',
        'page_number',
        'image_url',
    ];
}
