<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContent extends FormRequest
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
            'content_id'    => 'nullable',
            'user_id'       => 'nullable',
            'categories'    => 'required',
            'avatar'        => 'nullable|string',
            'upload'        => 'nullable|file|image|mimes:jpeg,png,gif,bmp|max:2048',
            'title'         => 'required',
            'alias'         => 'required',
            'summary'       => 'nullable',
            'content'       => 'required',
            'is_show'       => 'required',
            'is_draft'      => 'required',
            'is_featured'   => 'required',
            'sort'          => 'required',
            'tags'          => 'nullable',
            'description'   => 'nullable',
            'lang'          => 'nullable',
            'views'         => 'required',
            'note'          => 'nullable',
        ];
    }

    public function attributes()
    {
        return __('admin/contents');
    }
}
