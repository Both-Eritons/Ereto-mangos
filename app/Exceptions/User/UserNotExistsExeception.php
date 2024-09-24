<?php

namespace App\Exceptions\User;

use Exception;

class UserNotExistsExeception extends Exception
{
    public function __construct(
        string $msg = "Este Usuario não existe.",
        int $code = 404,
        $previus = null
    )
    {
        parent::__construct($msg, $code, $previus);
    }

}
