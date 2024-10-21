<?php
namespace App\Repositories\Favorite\Contract;

use App\Models\Favorite\Favorite;
use Illuminate\Database\Eloquent\Collection;

interface Contract
{
    public function getUserFavorite(int $id): Collection;
    public function CreateFavorite(array $data): Favorite;
}
