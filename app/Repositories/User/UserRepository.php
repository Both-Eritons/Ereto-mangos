<?php

namespace App\Repositories\User;

use App\Models\User\User;
use App\Repositories\User\Contract\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public function findByID(int $id): ?User
    {
        return User::find($id);
    }

    public function findByName(string $name): ?User
    {
        return User::where('username', $name)->first();
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
