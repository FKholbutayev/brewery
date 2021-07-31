<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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

    public function logout()
    {
        Auth::logout();
        
        return response()->json('', 204); 
    }

}