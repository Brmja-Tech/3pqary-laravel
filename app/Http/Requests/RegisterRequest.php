<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'child_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'parent_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', 
        ];
    }

    public function authorize()
    {
        return true; 
    }
}