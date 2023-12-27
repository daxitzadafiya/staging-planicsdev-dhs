<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OurClientUpdateRequest extends FormRequest
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
            'image' => [
                Rule::requiredIf(function () {
                    return !$this->our_client->image;
                })
            ],
            'is_active' => '',
        ];
    }
}
