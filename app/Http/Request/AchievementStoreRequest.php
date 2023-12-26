<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class AchievementStoreRequest extends FormRequest
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
            'image' => 'required',
            'is_active' => '',
        ];
    }
}
