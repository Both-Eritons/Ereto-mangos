<?php

namespace App\Http\Controllers;


class ChapterBase extends Controller
{
    public function respondManga(
        string $message = '',
        $status = 200,
        array $content = null)
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
