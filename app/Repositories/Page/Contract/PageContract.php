<?php

namespace App\Repositories\Page\Contract;

use App\Models\Manga\Page;

interface PageContract
{
    public function create(array $data): ?Page;
    public function findPageById(int $id): ?Page;
    public function findPageByChapterId(int $id): ?Page;
    public function findAllPagesByChapterId(int $id): ?Page;
}
