<?php

namespace App\Http\Controllers\Manga;

use App\Actions\Manga\CreateManga;
use App\Actions\Manga\FindByAuthor;
use App\Actions\Manga\FindById;
use App\Actions\Manga\FindByTypes;
use App\Actions\Manga\UpdateType;
use App\Actions\Manga\UpdateTitle;
use App\Actions\Manga\UpdateAuthor;
use App\Actions\Manga\UpdateSinopse;

use App\Http\Controllers\MangaController as ControllersMangaController;
use App\Http\Requests\Manga\CreateMangaRequest as CreateReq;
use App\Http\Requests\Manga\UpdateMangaRequest as UMR;
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

    public function findByType(Request $req, FindByTypes $action) {
        $type = (string) $req->type;
        $manga = $action->execute($type);

        return response()->json([
            'message' => 'Encontrado',
            'httpStatus' => 200,
            'manga' => $manga
        ], 200);
    }

    public function findByAuthor(Request $req, FindByAuthor $action) {
        $author = (string) $req->author;
        $manga = $action->execute($author);

        return response()->json([
            'message' => 'Encontrado',
            'httpStatus' => 200,
            'manga' => $manga
        ], 200);
    }

    public function updateTitle(UMR $req, UpdateTitle $action) {

        $manga = $action->execute($req->validated());

        return response()->json([
            'message' => 'Manga Atualizado',
            'httpStatus' => 200,
        ], 200);
    }

    public function updateAuthor(UMR $req, UpdateAuthor $action) {

        $manga = $action->execute($req->validated());

        return response()->json([
            'message' => 'Manga Atualizado',
            'httpStatus' => 200,
        ], 200);
    }

    public function updateType(UMR $req, UpdateType $action) {

        $manga = $action->execute($req->validated());

        return response()->json([
            'message' => 'Manga Atualizado',
            'httpStatus' => 200,
        ], 200);
    }

    public function updateSinopse(UMR $req, UpdateSinopse $action) {

        $manga = $action->execute($req->validated());

        return response()->json([
            'message' => 'Manga Atualizado',
            'httpStatus' => 200,
        ], 200);
    }


}
