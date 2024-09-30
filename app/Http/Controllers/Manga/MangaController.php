<?php

namespace App\Http\Controllers\Manga;

use App\Actions\Manga\CreateManga;
use App\Actions\Manga\FindById;
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

    public function findById(Request $req, FindById $action) {
        $id = (int) $req->id;
        $action = $action->execute($id);

        return response()->json([
            'message' => 'Encontrado',
            'httpStatus' => 200,
            'manga' => $action
        ], 200);
    }

    public function findMangasByType() {

    }
}
