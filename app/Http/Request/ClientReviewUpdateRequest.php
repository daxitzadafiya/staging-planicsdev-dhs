<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientReviewUpdateRequest extends FormRequest
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
            'image' => [
                Rule::requiredIf(function () {
                    return !$this->client_reviews->image;
                })
            ],
            'rating' => 'required|float|between:1,5',
            'review' => 'required',
            'is_active' => '',
        ];
    }
}
