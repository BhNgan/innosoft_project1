<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarousel extends FormRequest
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
            'carousel_name'  => 'nullable|string|max:191',
            'text_overlay'  => 'nullable|string|max:191',
            'url'  => 'nullable|string|max:191',
            'avatar'  => 'nullable|string|max:191',
            'sort'      => 'nullable|integer',
        ];
    }
}
