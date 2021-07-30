<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->userPayload());
        
        return response()->json('', 204); 
    }

    public function login() {

    }

    public function logout() {

    }
}


