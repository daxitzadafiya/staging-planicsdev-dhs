<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HeroSectionUpdateRequest extends FormRequest
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
            'image' => [
                Rule::requiredIf(function () {
                    return !$this->hero_section->image;
                })
            ],
            'button_text' => 'required',
            'button_url' => 'required',
            'is_active' => '',
        ];
    }
}
