<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'sometimes',
            'password_confirmation' => 'required_with:password|same:password',
        ];
    }

    /**
     * Modify the validation name.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password_confirmation.same' => 'Password Confirmation should match the Password.'
        ];
    }
}
