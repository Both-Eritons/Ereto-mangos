<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;

class PageBase extends Controller
{
    public function respondPage(
        string $message = '',
        $status = 200,
        array|Collection $content = null)
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
