<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class OurProcessStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'is_active' => '',
        ];
    }
}
