<?php

namespace App\Actions\Page;

use App\Repositories\Page\PageRepository;

class AllPagesByChapterId
{
    public function __construct(
        private PageRepository $page
    ){}

    public function execute(int $id)
    {
        $result = $this->page->findAllPagesByChapterId($id);

        return $result;
    }
}
