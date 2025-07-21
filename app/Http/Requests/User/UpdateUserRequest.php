<?php

namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $this->id,
            'password' => 'nullable|min:6|confirmed',
        ];
    }
}
