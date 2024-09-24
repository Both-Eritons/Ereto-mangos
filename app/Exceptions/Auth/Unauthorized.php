<?php

namespace App\Exceptions\Auth;

use Exception;

class Unauthorized extends Exception
{
    public function __construct(
        string $msg = "Você não tem Autoroização para continuar.",
        int $code = 401,
        $previus = null
    )
    {
        parent::__construct($msg, $code, $previus);
    }
}
