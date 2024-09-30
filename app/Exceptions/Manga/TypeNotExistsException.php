<?php

namespace App\Exceptions\Manga;

use Exception;

class TypeNotExistsException extends Exception
{
    public function __construct(
        $msg = 'Este Tipo não Existe',
        $httpCode = 404
    )
    {
        parent::__construct($msg, $httpCode);
    }

}
