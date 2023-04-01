<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
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
            'category_id'   => 'nullable|integer',
            'parent_id'     => 'required|integer',
            'avatar'        => 'nullable|string',
            'category_name' => 'required|string',
            'is_show'       => 'required|boolean',
            'sort'          => 'required|integer',
            'description'   => 'nullable|string',
            'lang'          => 'nullable|string',
            'note'          => 'nullable',
        ];
    }

    public function attributes()
    {
        return __('admin/categories');
    }
}
