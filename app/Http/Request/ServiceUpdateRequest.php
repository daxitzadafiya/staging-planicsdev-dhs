<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceUpdateRequest extends FormRequest
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
            'icon' => [
                Rule::requiredIf(function () {
                    return !$this->service->icon;
                })
            ],
            'image' => [
                Rule::requiredIf(function () {
                    return !$this->service->image;
                })
            ],
            'link_text' => 'required',
            'link_url' => 'required',
            'is_active' => '',
        ];
    }
}
