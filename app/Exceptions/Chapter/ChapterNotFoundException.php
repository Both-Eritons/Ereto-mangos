<?php

namespace App\Exceptions\Chapter;

use Exception;

class ChapterNotFoundException extends Exception
{
    public function __construct(
        $msg = 'Este Capitulo não Existe',
        $httpCode = 404
    )
    {
        parent::__construct($msg, $httpCode);
    }

}
