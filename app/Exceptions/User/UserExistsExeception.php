<?php

namespace App\Exceptions\User;

use Exception;

class UserExistsExeception extends Exception
{
    public function __construct(
        string $msg = "Este Usuario já Existe.",
        int $code = 401,
        $previus = null
    )
    {
        parent::__construct($msg, $code, $previus);
    }

}
