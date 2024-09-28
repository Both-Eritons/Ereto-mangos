<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function respondWithToken(string $token) {
        return response()->json($token, 200);
    }
}
