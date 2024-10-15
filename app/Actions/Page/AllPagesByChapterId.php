<?php

namespace App\Actions\Page;

use App\Exceptions\Manga\PagesEmptyException;
use App\Repositories\Page\PageRepository;

class AllPagesByChapterId
{
    public function __construct(
        private PageRepository $page
    ){}

    public function execute(int $id)
    {
        $result = $this->page->findAllPagesByChapterId($id);

        if(!count($result)) throw new PagesEmptyException();

        return $result;
    }
}
