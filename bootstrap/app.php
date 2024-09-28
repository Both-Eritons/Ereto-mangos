<?php

use App\Exceptions\Auth\Authenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Exceptions\Auth\Unauthorized as Unau;
use App\Exceptions\User\UserDataException as UserData;
use App\Exceptions\User\UserExistsExeception as UserExists;
use App\Exceptions\User\UserNotExistsExeception as UserNotExists;
use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Http\Request as Req;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException as AccessDenied;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(ForceJsonResponse::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function(Unau $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });

        $exceptions->render(function(UserData $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });

        $exceptions->render(function(UserNotExists $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });

        $exceptions->render(function(UserExists $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });

        $exceptions->render(function(AccessDenied $e, Req $req) {
                return response()->json([
                    "message" => "Acesso Não Permitido...",
                ], 403);
        });

        $exceptions->render(function(Authenticated $e, Req $req) {
            if($req->is('api/*')) {
                return response()->json([
                    "message" => $e->getMessage(),
                ], $e->getCode());
            }
        });



    })->create();
