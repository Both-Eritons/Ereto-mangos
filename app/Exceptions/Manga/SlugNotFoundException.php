<?php

namespace App\Exceptions\Manga;

use Exception;

class SlugNotFoundException extends Exception
{
    public function __construct(
        string $message = 'Esse Manga nao existe',
        $status = 404
    )
    {
        parent::__construct($message, $status);
    }
}
