<?php

namespace App\Actions\Auth;

use App\Exceptions\Auth\Unauthorized;

class Logout {

    public function __construct()
    {

    }

    public function execute() {
        $check = auth()->guard()->check();

        if($check) {
            auth()->guard()->logout();
            return ['message' => 'Desconectado com sucesso!'];
        }

        return throw new Unauthorized();
    }

}
