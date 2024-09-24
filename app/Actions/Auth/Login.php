<?php

namespace App\Actions\Auth;

use App\Exceptions\Auth\Unauthorized;
use App\Exceptions\User\UserNotExistsExeception;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\User\UserRepository;

class Login {

    public function __construct(private UserRepository $user)
    {

    }

    public function execute(LoginRequest $req) {
        $data = $req->validated();

        $user = $this->user->findByEmail($data['email']);

        if(!$user) throw new UserNotExistsExeception();

        $token = auth()->guard()->attempt($data);

        if(!$token) throw new Unauthorized();

        return $token;
    }

}
