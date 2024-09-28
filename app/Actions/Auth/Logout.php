<?php

namespace App\Actions\Auth;


class Logout {

    public function __construct()
    {

    }

    public function execute() {
        $check = auth()->guard()->check();

        if($check) {
            return auth()->guard()->logout();
        }

        return ["message" => "Você não Esta Autenticado!"];
    }

}
