<?php

namespace App\Actions\Auth;

use App\Models\User\User;
use App\Repositories\User\UserRepository;

class Login {

    public function __construct(private UserRepository $user)
    {

    }

    public function execute(): ?User {
        $user = $this->user->findByEmail('');

        return $user;
    }

}
