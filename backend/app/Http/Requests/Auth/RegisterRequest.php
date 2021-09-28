<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user.name' => ['required', 'string'],
            'user.email' => ['required', 'email', 'unique:users,email'],
            'user.password' => ['required'],
            'email.key' => ['required'],
            'email.code' => ['required', 'max:4']
        ];
    }
}
