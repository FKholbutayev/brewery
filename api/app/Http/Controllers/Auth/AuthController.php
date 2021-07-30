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
        dd($request->validated());
    }

    public function login() {

    }

    public function logout() {

    }
}


