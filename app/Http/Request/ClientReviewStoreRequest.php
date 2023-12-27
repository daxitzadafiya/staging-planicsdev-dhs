<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ClientReviewStoreRequest extends FormRequest
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
            'image' => 'required',
            'rating' => 'required|numeric|between:1,5',
            'review' => 'required',
            'is_active' => '',
        ];
    }
}
