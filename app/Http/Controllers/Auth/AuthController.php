<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\Login;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends ControllersAuthController
{
    public function login(LoginRequest $req, Login $login) {
        $user = (string) $login->execute($req);
        return $this->respondWithToken($user);
    }

    public function register() {

    }

    public function myself() {

    }

    public function logout() {

    }
}
