<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCategoryStoreRequest extends FormRequest
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
            'service_id' => 'required',
            'is_active' => '',
        ];
    }

    /**
     * Modify the validation name.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'service_id.required' => 'The service field is required.'
        ];
    }
}
