<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;

abstract class Controller
{

    public function respondWithUser(
        $message = null,
        $httpCode = 200,
        UserResource $user) {
        return response()->json([
            'message' => $message,
            'status' => $httpCode,
            'user' => $user,
        ], $httpCode);
    }
}
