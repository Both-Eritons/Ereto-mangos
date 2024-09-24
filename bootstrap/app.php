<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Exceptions\Auth\Unauthorized as Unau;
use App\Exceptions\User\UserDataException as UserData;
use App\Exceptions\User\UserExistsExeception as UserExists;
use App\Exceptions\User\UserNotExistsExeception as UserNotExists;
use Illuminate\Http\Request as Req;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
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

    })->create();
