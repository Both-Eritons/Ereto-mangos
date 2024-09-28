<?php

namespace App\Exceptions\Auth;

use Exception;

class Authenticated extends Exception
{
    public function __construct(
        string $msg = "Você Está Autenticado.",
        int $code = 403,
        $previus = null
    )
    {
        parent::__construct($msg, $code, $previus);
    }

}
