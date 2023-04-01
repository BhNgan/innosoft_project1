<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateType extends FormRequest
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
            'avatar'    => 'nullable|string',
            'upload'    => 'nullable|file|image|mimes:jpeg,png,gif|max:2048',
            'type_name' => 'required|string',
            'is_show'   => 'nullable|boolean',
            'sort_note' => 'nullable|',
        ];
    }
}
