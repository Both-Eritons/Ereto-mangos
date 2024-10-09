<?php

namespace App\Exceptions\Manga;

use Exception;

class DeleteMangaException extends Exception
{
    public function __construct(
        $msg = 'Ocorreu Algum Erro ao tentar Deletar o Manga',
        $httpCode = 400
    )
    {
        parent::__construct($msg, $httpCode);
    }
}
