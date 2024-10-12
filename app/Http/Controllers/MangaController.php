<?php

namespace App\Http\Controllers;

use App\Http\Resources\Manga\MangaResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function respondManga(
        string $message = '',
        $status = 200,
        array|MangaResource|Collection $content = null)
    {
        $array = [
            'message' => $message,
            'status' => $status,
        ];

        if($content) {
            $array['manga'] = $content;
        }

        return response($array, $status);
    }
}
