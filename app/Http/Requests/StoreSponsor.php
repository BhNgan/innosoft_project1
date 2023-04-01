<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSponsor extends FormRequest
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
            'upload'        => 'nullable|file|image|mimes:jpeg,png,gif,bmp|max:7168',
            'sponsor_name'  => 'required|string|max:191',
            'note'          => 'nullable|string|max:191',
        ];
    }
}
