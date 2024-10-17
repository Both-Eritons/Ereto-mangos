<?php

namespace App\Http\Controllers\Manga;

use App\Actions\Manga\{

    CreateManga,
    DeleteMangaById,
    FindByAuthor,
    FindBySlug,
    FindById,
    FindByTitle,
    FindByTypes,
    UpdateType,
    UpdateTitle,
    UpdateAuthor,
    UpdateSinopse,
};
use App\Enums\Roles\RolesEnum;
use App\Http\{
    Controllers\MangaBase,
    Requests\Manga\CreateMangaRequest as CreateReq,
    Requests\Manga\UpdateMangaRequest as UMR,

};
use App\Http\Resources\Manga\MangaResource;
use App\Models\User\User;
use Illuminate\Http\Request;

class MangaController extends MangaBase
{
    public function create(CreateReq $req, CreateManga $action, User $user)
    {
        $user->hasRole([RolesEnum::ADMIN->value]);
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

    public function findBySlug(Request $req, FindBySlug $action)
    {
        $result = $action->execute((string) $req->Slug);
        $rsc = new MangaResource($result);
        return $this->respondManga('Manga Encontrado', 200, $rsc);
    }

    public function findByTitle(Request $req, FindByTitle $action)
    {
        $result = $action->execute((string) $req->title);
        $rsc = new MangaResource($result);
        return $this->respondManga('Manga Encontrado', 200, $rsc);
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
