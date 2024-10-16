<?php

namespace App\Dtos;

readonly class NangaDto
{

    public function __construct(
        public string $title,
        public string $type,
        public string $author,
        public string $sinopse,
        public string $cover_image,
    )
    {}

}
