<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PointOfDifferenceStoreRequest extends FormRequest
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
            'link_text' => 'required',
            'link_url' => 'required',
            'is_active' => '',
        ];
    }
}
