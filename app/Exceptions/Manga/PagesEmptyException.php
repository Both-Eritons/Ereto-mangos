<?php

namespace App\Exceptions\Manga;

use Exception;

class PagesEmptyException extends Exception
{
    public function __construct(
        string $message = 'Esse Capitulo nao tem Paginas',
        $status = 404
    )
    {
        parent::__construct($message, $status);
    }

}
