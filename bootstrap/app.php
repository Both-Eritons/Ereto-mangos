<?php

use App\Exceptions\Auth\Authenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Exceptions\Auth\Unauthorized as Unau;
use App\Exceptions\Manga\MangaNotExistsException as MangaNotExists;
use App\Exceptions\Manga\PagesEmptyException;
use App\Exceptions\Manga\SlugNotFoundException;
use App\Exceptions\Manga\TypeNotExistsException as TypeNotExist;
use App\Exceptions\Manga\UpdateFieldNotExistsException as UpdateField;
use App\Exceptions\User\UserDataException as UserData;
use App\Exceptions\User\UserExistsExeception as UserExists;
use App\Exceptions\User\UserNotExistsExeception as UserNotExists;
use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Http\Request as Req;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException as AccessDenied;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as NotFound;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(ForceJsonResponse::class);
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_permission' => RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $ex) {
        $ex->render(function(NotFound $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => 'Essa rota não existe.',
                ], 404);
            }
        });
        $ex->render(function(Unau $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });

        $ex->render(function(UserData $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });
        $ex->render(function(UserNotExists $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });
        $ex->render(function(UserExists $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });
        $ex->render(function(AccessDenied $e, Req $req) {
                return response()->json([
                    "message" => "Acesso Não Permitido...",
                ], 403);
        });
        $ex->render(function(Authenticated $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });
        $ex->render(function(MangaNotExists $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });
        $ex->render(function(TypeNotExist $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });
        $ex->render(function(SlugNotFoundException $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });
        $ex->render(function(PagesEmptyException $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });
        $ex->render(function(UnauthorizedException $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => 'Você não tem permissão para continuar.'
                ], $e->getCode() | 403);
            }
        });

    })->create();
