<?php

namespace App\Repositories\User\Contract;

use App\Models\User\User;

interface UserRepositoryInterface {
    public function findByID(int $id): ?User;
    public function findByEmail(string $email): ?User;
    public function findByName(string $name): ?User;
    public function createUser(array $data): ?User;
}
