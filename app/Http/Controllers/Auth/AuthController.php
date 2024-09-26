<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\Login;
use App\Actions\Auth\Myself;
use App\Actions\Auth\Register;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;

class AuthController extends ControllersAuthController
{
    public function login(LoginRequest $req, Login $login) {
        $user = (string) $login->execute($req);
        return $this->respondWithToken($user);
    }

    public function register(RegisterRequest $req, Register $register) {
        $data = $req->validated();
        $user = $register->execute($data);

        return $this->respondWithUser(
            "Registrado",
            201,
            new UserResource($user));
    }

    public function myself(Myself $myself) {
        return response()->json($myself->execute());
    }

    public function logout() {

    }
}
