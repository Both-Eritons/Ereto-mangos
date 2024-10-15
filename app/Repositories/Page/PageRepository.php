<?php

namespace App\Repositories\Page;

use App\Models\Manga\Chapter;
use App\Models\Manga\Page;
use App\Repositories\Page\Contract\PageContract;

class PageRepository implements PageContract
{
    public function __construct(
        private Page $page,
        private Chapter $chapter,
    ){}

    public function create(array $data): ?Page
    {
        return $this->page::create($data);
    }

    public function findPageById(int $id): ?Page
    {
        return $this->page::find($id);
    }

    public function findPageByChapterId(int $id): ?Page
    {
        return $this->chapter::find($id)->page;
    }

    public function findAllPagesByChapterId(int $id): ?Page
    {
        return $this->page;
    }
}
