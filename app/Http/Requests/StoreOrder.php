<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'address'               => 'required|max:191',
            'content'                 => 'required|string|max:191',
            'email'                 => 'required|string|max:191',
            'first_name'         => 'required|string|max:191',
            'last_name'         => 'required|string|max:191',
            'phone'                 => 'required|string|max:12',
            'sum'                 => 'numeric',
            // 'total'                 => 'required|numeric',
        ];
    }
}
