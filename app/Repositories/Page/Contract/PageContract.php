<?php

namespace App\Repositories\Page\Contract;

use App\Models\Manga\Page;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface PageContract
{
    public function create(array $data): ?Page;
    public function findPageById(int $id): ?Page;
    public function findPageByChapterId(int $id): ?Page;
    public function findAllPagesByChapterId(int $id): ?Collection;
}
