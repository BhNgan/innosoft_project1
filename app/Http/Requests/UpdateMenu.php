<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenu extends FormRequest
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
            'menu_id'   => 'nullable|integer',
            'parent_id' => 'required|integer',
            'menu_name' => 'required|string',
            'alias'     => 'required|string|unique:menus,alias,'.$this->route('menu')->id,
            'type'      => 'required|string',
            'target'    => 'nullable|string',
            'is_show'   => 'required|boolean',
            'sort'      => 'required|integer',
            'lang'      => 'nullable|string',
            'note'      => 'nullable',
            'banner'    => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return __('admin/menus');
    }
}
