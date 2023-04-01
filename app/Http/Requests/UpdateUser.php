<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name'      => 'required|string|max:191',
            'username'  => 'required|max:191|unique:users,username,' . $this->user->id,
            'password'  => 'nullable|confirmed|max:191|min:6',
            'email'     => 'nullable|email|max:191|unique:users,email,' . $this->user->id,
            'active'    => 'required|boolean',
        ];
    }

    public function attributes()
    {
        return __('admin/users');
    }
}
