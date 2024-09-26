<?php

namespace App\Actions\Auth;

use App\Exceptions\User\UserDataException;
use App\Exceptions\User\UserExistsExeception;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\User\UserRepository;

class Register {

    public function __construct(private UserRepository $user)
    {

    }

    public function execute(array $data) {
        $user = $this->user->findByEmail($data['email']);

        if($user) throw new UserExistsExeception();

        $user = $this->user->createUser($data);

        if(!$user) throw new UserDataException();

        return $user;

    }

}
