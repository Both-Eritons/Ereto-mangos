<?php

namespace App\Http\Controllers\Manga;

use App\Actions\Manga\{

    CreateManga,
    DeleteMangaById,
    FindByAuthor,
    FindById,
    FindByTypes,
    UpdateType,
    UpdateTitle,
    UpdateAuthor,
    UpdateSinopse,
};

use App\Http\{
    Controllers\MangaController as Controller,
    Requests\Manga\CreateMangaRequest as CreateReq,
    Requests\Manga\UpdateMangaRequest as UMR,

};
use App\Http\Resources\Manga\MangaResource;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function create(CreateReq $req, CreateManga $action)
    {
        $data = $req->validated();
        $result = $action->execute($data);
        $rsc = new MangaResource($result);
        return $this->respondManga('Manga Criado', 201, $rsc);
    }

    public function deleteById(Request $req, DeleteMangaById $action)
    {
        $action->execute( (int) $req->id );
        return $this->respondManga('Manga Deletado', 200);
    }

    public function findById(Request $req, FindById $action)
    {
        $result = $action->execute( (int) $req->id );
        $rsc = new MangaResource($result);
        return $this->respondManga('Manga Encontrado', 200, $rsc);
    }

    public function findByTypes(Request $req, FindByTypes $action)
    {
        $type = (string) $req->type;
        $result = $action->execute($type);
        return $this->respondManga('Manga Encontrado', 200, $result);
    }

    public function findByAuthor(Request $req, FindByAuthor $action)
    {
        $author = (string) $req->author;
        $result = $action->execute($author);
        return $this->respondManga('Manga Encontrado', 200, $result);
    }

    public function updateTitle(UMR $req, UpdateTitle $action)
    {
        $action->execute($req->validated());
        return $this->respondManga('Manga Atualizado', 200);
    }

    public function updateAuthor(UMR $req, UpdateAuthor $action)
    {
        $action->execute($req->validated());
        return $this->respondManga('Manga Atualizado', 200);
    }

    public function updateType(UMR $req, UpdateType $action)
    {
        $action->execute($req->validated());
        return $this->respondManga('Manga Atualizado', 200);
    }

    public function updateSinopse(UMR $req, UpdateSinopse $action)
    {
        $action->execute($req->validated());
        return $this->respondManga('Manga Atualizado', 200);
    }
}
