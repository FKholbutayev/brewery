<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


class LoginProxy 
{
    public function attempLogin($loginPayload)
    {
       $isLoggedIn =  Auth::attempt($loginPayload); 

       if(!$isLoggedIn) {
           return response()->json([
                'error' => 'invalid_credentials'
            ], 403);
       }

       return response()->json(['', 204]);
    }
}