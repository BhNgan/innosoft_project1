<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfig extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address'   => 'nullable|string',
            'phone'     => 'nullable|string',
            'email'     => 'nullable|email',
            'facebook'  => 'nullable|string',
            'youtube'   => 'nullable|string',
            'instagram' => 'nullable|string',
        ];
    }
}
