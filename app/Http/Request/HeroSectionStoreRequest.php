<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionStoreRequest extends FormRequest
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
            'sub_title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
            'is_active' => '',
        ];
    }
}
