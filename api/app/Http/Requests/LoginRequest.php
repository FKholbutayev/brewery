<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email', 
            'password' => 'required|string'
        ];
    }

    public function loginPayload()
    {
        return collect($this->validated())
            ->only([
                'email',
                'password'
            ])
            ->toArray();
    }
}
