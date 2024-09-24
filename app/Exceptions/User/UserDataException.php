<?php

namespace App\Exceptions\User;

use Exception;

class UserDataException extends Exception
{
    public function __construct(
        string $fields = "",
        int $code = 400,
        $previus = null
    )
    {
        $fields = "Algum Campo está Errado: $fields";

        parent::__construct($fields, $code, $previus);
    }

}
