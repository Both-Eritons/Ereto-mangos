<?php

namespace App\Exceptions\Manga;

use Exception;

class MangaNotExistsException extends Exception
{
    public function __construct(
        $msg = 'Este Manga não Existe',
        $httpCode = 404
    )
    {
        parent::__construct($msg, $httpCode);
    }
}
