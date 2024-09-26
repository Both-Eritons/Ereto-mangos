<?php

namespace App\Actions\Auth;


class Myself {

    public function __construct()
    {

    }

    public function execute() {
        $check = auth()->guard()->check();

        if($check) {
            return auth()->guard()->user();
        }

        return ["message" => "Você não Esta Autenticado!"];
    }

}
