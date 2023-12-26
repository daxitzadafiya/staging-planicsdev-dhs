<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PointOfDifferenceUpdateRequest extends FormRequest
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
            'image' => [
                Rule::requiredIf(function () {
                    return !$this->point_of_difference->image;
                })
            ],
            'link_text' => 'required',
            'link_url' => 'required',
            'is_active' => '',
        ];
    }
}
