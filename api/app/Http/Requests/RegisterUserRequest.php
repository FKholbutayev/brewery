<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function userPayload() 
    {
        return collect($this->validated())
            ->only([
                'name',
                'email',
                'password',
                'confirm_password'
            ])
            ->toArray();
    }


}
