<?php
namespace App\Repositories\Favorite;

use App\Models\Favorite\Favorite;
use App\Repositories\Favorite\Contract\Contract;
use Illuminate\Database\Eloquent\Collection;

class FavRepository implements Contract{
    public function __construct(
        private Favorite $fav,
    ){}

    public function getUserFavorite(int $id): Collection
    {
        return $this->fav::where('user_id', $id)->get();
    }

    public function CreateFavorite(array $data): Favorite
    {
        return $this->fav::create($data);
    }
}
