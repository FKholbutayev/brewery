<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginProxy;


class AuthController extends Controller
{
    private $loginProxy; 

    public function __construct(LoginProxy $loginProxy)
    {
       $this->loginProxy = $loginProxy;
    }
    public function register(RegisterUserRequest $request)
    {
        User::create($request->userPayload());
        
        return response()->json('', 204); 
    }

    public function login(LoginRequest $request) 
    {
        return $this->loginProxy->attempLogin($request->loginPayload());
    }

    public function logout() {

    }
}


