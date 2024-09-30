<?php

namespace App\Http\Controllers\Manga;

use App\Actions\Manga\CreateManga;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MangaController as ControllersMangaController;
use App\Http\Requests\Manga\CreateMangaRequest as CreateReq;
use Illuminate\Http\Request;

class MangaController extends ControllersMangaController
{
    public function create(CreateReq $req, CreateManga $manga) {
        $data = $req->validated();

        $result = $manga->execute($data);

        return response()->json([
            'message' => 'Manga Criado',
            'httpStatus' => 201,
            'manga' => $result,
        ], 201);
    }

    public function findById(Request $req) {

    }

    public function findMangasByType() {

    }
}
